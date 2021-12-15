import { Injectable } from '@angular/core';
import { User } from '../models/User';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  public user:User | undefined;
  public email:string =  '';
  public id:string;
  // private api = 'http://127.0.0.1:8000/api';
  // private api = 'http://frontyincanas.iesgrancapitan.org/api';
  private api = 'http://cpd.iesgrancapitan.org:9117/api';


  constructor(
    private http: HttpClient,
  ) { }
  getEmail():any{
    if(localStorage.getItem('email')){
      return localStorage.getItem('email');  
    }
  }
  getName():any{
    if(localStorage.getItem('name')){
      var name = localStorage.getItem('name').split(' ');
      return name[0];  
    }
  }
  getProfilePhoto():any{
    if(localStorage.getItem('profilePhoto')){
      return localStorage.getItem('profilePhoto');  
    }
  }
  isLogued(){
    if(this.getEmail() === '' || this.getEmail() === undefined ){
      return false;
    }else{
      return true;
    }
  }
  
  getIdUser(email:string){
    const path = `${this.api}/get_id_user/${email}`;
    return this.http.get<any>(path);
  }

  getIdGroup(id:number){
    const path = `${this.api}/getgroup/${id}`;
    return this.http.get<any>(path);
  }

  getGroupDescription(id:number){
    const path = `${this.api}/getgroupdescription/${id}`;
    return this.http.get<any>(path);
  }
  getIdParticipant(id_group:number){
    const path = `${this.api}/getparticipant/${id_group}`;
    return this.http.get<any>(path);
  }
  getInscription(id_gymkana_instance:number, id_participant:number){
    const path = `${this.api}/getinscription/${id_gymkana_instance}/${id_participant}`;
    return this.http.get<any>(path);
  }
  getParticipantById(id:number){
    const path = `${this.api}/getparticipantbyid/${id}`;
    return this.http.get<any>(path);
  }
  getParticipantByData(id_gymkana_instance:number, id_group:number){
    const path = `${this.api}/getparticipantbydata/${id_gymkana_instance}/${id_group}`;
    return this.http.get<any>(path);
  }

  getAllUserGroup(){
    const path = `${this.api}/getallusergroup/`;
    return this.http.get<any>(path);
    
  }
  getDescriptionById(id:number){
    const path = `${this.api}/getdescriptionbyid/${id}`;
    return this.http.get<any>(path);
  }
}
