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

  constructor(
    public authService: AuthService,
    public userService: UserService,
    public dataService: DataService,
    private router: Router,
    private route: ActivatedRoute,
  ) {
    super(authService, userService);
  }

  ngOnInit(): void { // llamada a la api para obtener todos los grupos
    this.showSingleInscription();
    this.formGroupInscription = new FormGroup({
      id_gk_instance: new FormControl(''),
      group: new FormControl(''),
      // observations: new FormControl(''),
      
    });
    this.createSelect();
    // this.groups.forEach(element => console.log(element));
    // this.createIncription();
    
  }
  showSingleInscription() {
    this.route.params.subscribe(params => {
      this.id = params['id'];  // ORIGINAL
    });
    console.log(this.id)
     this.userService.getIdGroup(this.id).subscribe(res => {
       console.log(res)
      res.forEach(element => {
        this.userService.getGroupDescription(element.id_group).subscribe(group => {
          console.log("grupo" ,group);
          this.group = group[0];
        })
      }); 
    });


  }
  signUp() {

    let id_gymkana = parseInt((document.getElementById("id_gymkana_instance") as HTMLInputElement).value);
    let group = (document.getElementById("group") as HTMLInputElement).value;

    console.log(id_gymkana);
    console.log(this.groupId);
    this.dataService.createParticipant(id_gymkana, this.groupId);
    this.router.navigate(['/gymkanas']); 

    // let observations = (document.getElementById("observations") as HTMLInputElement).value;
    // var id_participant:number;
    // console.log(id_gymkana);
    // console.log(group);
    // console.log(observations );
    // this.userService.getIdParticipant(group).subscribe(res => {
    //   id_participant = res[0].id;
    //   this.dataService.storeInscription(id_gymkana, id_participant, observations)
    // });
    // this.router.navigate(['/inscriptions']);
  }

  createSelect() {
    this.userService.getAllUserGroup().subscribe(res => {
      console.log("RES", res);
      res.forEach(element => {
        if(element.id_user == localStorage.getItem("id")){
          console.log(element.id_group);
          this.userService.getDescriptionById(element.id_group).subscribe(groups => { //recibe el id del grupo y devuelve el grupo entero
            console.log(groups);
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

  // showNameGymkana() {
  //   this.userService.getAllUserGroup().subscribe(name => {
  //     this.dataService.getNameGymkanaById(ele)
  //     this.groups.push(name);
  //   })
  // }

  // LIADO INSCRIPCIONES CON PARTICIPANTES
  createIncription() {
    this.dataService.showParticipant(parseInt((document.getElementById("id_gymkana_instance") as HTMLInputElement).value), parseInt(localStorage.getItem("id")));
  }
}
