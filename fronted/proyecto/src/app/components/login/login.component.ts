import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth/auth.service';
import { UserService } from 'src/app/services/user.service';
import { HomeComponent } from '../home/home.component';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['../home/home.component.html' , './login.component.html']
})
export class LoginComponent extends HomeComponent implements OnInit{
  isLogued:boolean = false;
  constructor(
    public authService:AuthService,
    public userService:UserService,

  ) {
    super(authService, userService);
  }

  ngOnInit(): void {
    this.isLogued = this.userService.isLogued();
  }

  login(){
    this.authService.popUpLogin();
  }
}
