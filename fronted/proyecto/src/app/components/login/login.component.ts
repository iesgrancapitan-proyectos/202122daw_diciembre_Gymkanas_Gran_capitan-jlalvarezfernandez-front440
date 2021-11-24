import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
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
    public router: Router

  ) {
    super(authService, userService, router);
  }

  ngOnInit(): void {
    this.isLogued = this.userService.isLogued();
  }

  login(){
    this.authService.popUpLogin();
  }
}
