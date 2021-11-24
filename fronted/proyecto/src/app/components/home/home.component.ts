import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth/auth.service';
import { UserService } from 'src/app/services/user.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  id:number;
  email:string="";
  profilePhoto:string="";
  name:string="";
  idGroup:number;

  logued:boolean=false;
  constructor(
    public authService:AuthService,
    public userService:UserService,
    public router:Router,
  ) { }

  ngOnInit(): void {
    console.log(this.router.url);
    this.logued = this.userService.isLogued();
    this.email = this.userService.getEmail();
    this.profilePhoto = this.userService.getProfilePhoto();
    this.name = this.userService.getName();
    if(this.logued){
      this.getUserDataId(this.email);
      this.id = parseInt(localStorage.getItem("id"));
      // this.getUserDataIdGroup(parseInt(localStorage.getItem("id")));
      this.idGroup = parseInt(localStorage.getItem("idGroup"));
    }   
     
  }

  getUserDataId(email:string){
    this.userService.getIdUser(email).subscribe(data => {
      if(data){
        localStorage.setItem("id", data[0].id);
      }
    }, err => {
        console.log("No se encontró el id del usuario")
    });
    
  }
  
}
