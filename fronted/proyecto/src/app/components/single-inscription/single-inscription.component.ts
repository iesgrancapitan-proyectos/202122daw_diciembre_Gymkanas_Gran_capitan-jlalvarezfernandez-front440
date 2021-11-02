import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth/auth.service';
import { UserService } from 'src/app/services/user.service';
import { DataService } from 'src/app/services/data.service';
import { HomeComponent } from '../home/home.component';
import { ActivatedRoute, Router } from '@angular/router';
import { Inscription } from 'src/app/models/Inscription';
import { Group } from 'src/app/models/Group';
import { FormControl, FormGroup } from '@angular/forms';
@Component({
  selector: 'app-single-inscription',
  templateUrl: './single-inscription.component.html',
  styleUrls: ['../home/home.component.html', './single-inscription.component.scss']
})
export class SingleInscriptionComponent extends HomeComponent implements OnInit {
  inscription: FormGroup;
  id:number;
  groups:Group[]=[];
  constructor(
    public authService:AuthService,
    public userService:UserService,
    public dataService:DataService,
    private router:Router,
    private route:ActivatedRoute,
  ) {
    super(authService, userService);
   }

  ngOnInit(): void {
    this.showSingleInscription();
    this.inscription = new FormGroup({
      group: new FormControl(''),
      observations: new FormControl(''),
    });
  }
  showSingleInscription(){
    this.route.params.subscribe(params => {
      this.id = params['id'];
    });
    this.userService.getIdGroup(this.id).subscribe(res => {
      res.forEach(element => {
        this.userService.getGroupDescription(element.id_group).subscribe(group => {
          this.groups.push(group);
        })
      });
    });
  }
  signUp(){
    let id_gymkana = parseInt((document.getElementById("id_gymkana") as HTMLInputElement).value);
    let group = parseInt((document.getElementById("group") as HTMLInputElement).value);
    let observations = (document.getElementById("observations") as HTMLInputElement).value;
    var id_participant:number;
    this.userService.getIdParticipant(group).subscribe(res => {
      id_participant = res[0].id;
      this.dataService.storeInscription(id_gymkana, id_participant, observations)
    });
    this.router.navigate(['/inscriptions']);
  }
}
