import { Injectable} from '@angular/core';
import { Router } from '@angular/router';
import { CanActivate } from '@angular/router';
import { UserService } from 'src/app/services/user.service';

@Injectable()
export class AuthGuardComponent implements CanActivate {

  constructor(
    private userService:UserService,
    private router:Router,
  ) { }

  canActivate(){
    if(!this.userService.isLogued()){
      console.log('No estás logueado');
      this.router.navigate(['/login']);
      return false;
    }
    return true;
  }
}
