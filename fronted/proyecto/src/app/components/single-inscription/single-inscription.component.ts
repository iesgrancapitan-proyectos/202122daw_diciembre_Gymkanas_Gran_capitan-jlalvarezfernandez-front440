import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth/auth.service';
import { UserService } from 'src/app/services/user.service';
import { DataService } from 'src/app/services/data.service';
import { HomeComponent } from '../home/home.component';
import { ActivatedRoute, Router } from '@angular/router';
import { Inscription } from 'src/app/models/Inscription';
import { Group } from 'src/app/models/Group';
import { FormControl, FormGroup } from '@angular/forms';
import { Gymkana } from 'src/app/models/Gymkana';
@Component({
  selector: 'app-single-inscription',
  templateUrl: './single-inscription.component.html',
  styleUrls: ['../home/home.component.html', './single-inscription.component.scss']
})
export class SingleInscriptionComponent extends HomeComponent implements OnInit {
  formGroupInscription: FormGroup;
  id: number;
  group: Group;
  groupDescription : string;
  groupId : number;
  nameGymkana: string;

  constructor(
    public authService: AuthService,
    public userService: UserService,
    public dataService: DataService,
    public router: Router,
    private route: ActivatedRoute,
    
  ) {
    super(authService, userService, router);
  }

  ngOnInit(): void { // llamada a la api para obtener todos los grupos
    this.showSingleInscription();
    this.formGroupInscription = new FormGroup({
      id_gk_instance: new FormControl(''),
      group: new FormControl(''),
      
    });
    this.createSelect();
    
  }
  showSingleInscription() {
    this.route.params.subscribe(params => {
      this.id = params['id'];  // ORIGINAL
    });

    this.dataService.getGymkanaByIdInstancia(this.id).subscribe(gk_instance => {
      this.dataService.getNameGymkanaById(gk_instance[0].id_gymkana).subscribe(res => {
        this.nameGymkana = res[0].name;
      });
    });

     this.userService.getIdGroup(this.id).subscribe(res => {
      res.forEach(element => {
        this.userService.getGroupDescription(element.id_group).subscribe(group => {
          this.group = group[0];
        })
      }); 
    });


  }
  signUp() {
    this.dataService.createParticipant(this.id, this.groupId);
    this.router.navigate(['/gymkanas']); 
  }

  createSelect() {
    this.userService.getAllUserGroup().subscribe(res => {
      res.forEach(element => {
        if(element.id_user == localStorage.getItem("id")){
          this.userService.getDescriptionById(element.id_group).subscribe(groups => { //recibe el id del grupo y devuelve el grupo entero
            this.groupDescription = groups[0].description;
            this.groupId = groups[0].id;
          })
        }
      });
    });
  }

  showNameGymkana() {
    this.userService.getAllUserGroup().subscribe(res => {
      res.forEach(element => {
        this.dataService.getNameGymkanaById(element.id_group).subscribe(name => {
         this.name = name;
        })
      });
    });
  }

 
  createIncription() {
    this.dataService.showParticipant(parseInt((document.getElementById("id_gymkana_instance") as HTMLInputElement).value), parseInt(localStorage.getItem("id")));
  }
}
