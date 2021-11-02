import { Injectable } from '@angular/core';
import { AngularFireAuth } from '@angular/fire/auth';
import { Router} from '@angular/router';
import * as firebase from 'firebase';
import { TestsComponent } from 'src/app/components/tests/tests.component';

@Injectable({
  providedIn: 'root'
})
export class AuthService{
  
  public email:string = '';
  validEmail = '@iesgrancapitan.org';
  constructor(
    private fire:AngularFireAuth,
    private router:Router) 
    {
      this.email = '';
      
    }

  popUpLogin(){
    this.fire.signInWithPopup(new firebase.default.auth.GoogleAuthProvider()).then(result => {
      this.fire.user.subscribe(login => {
        if(login){
          this.router.navigate(['/home'])
          if(login.email.includes(this.validEmail)){
            localStorage.setItem('email', login.email);
            localStorage.setItem('profilePhoto', login.photoURL);
            localStorage.setItem('name', login.displayName);
          }else{
            console.log("Sin correo corporativo no puedes acceder");
            
          }
        }
      })
      return localStorage.getItem('email');
      
    }, err => {
      console.log('Error LOGIN');
    })
  }

  logout(){
    this.fire.signOut().then(res => {
      console.log('LOGOUT');
      localStorage.removeItem('email');
      localStorage.removeItem('profilePhoto');
      localStorage.removeItem('name');
      localStorage.removeItem('id');
      localStorage.removeItem('idGroup');
      this.router.navigate(['/login']);
      }, err => {
        console.log('Error LOGOUT');
      })
  }
}

