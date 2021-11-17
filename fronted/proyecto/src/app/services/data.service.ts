import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

// import { Api } from '../interfaces/api';
import { map, catchError } from 'rxjs/operators';
import { UserService } from '../services/user.service';
import { Test } from '../models/Test';

@Injectable({
  providedIn: 'root'
})
export class DataService {

  private api = 'http://127.0.0.1:8000/api';
  
  constructor(
    private http: HttpClient,
    private userService: UserService
  ) { }
  
  getAllActivesGymkanas(){
    const path = `${this.api}/gymkanas_instances_future`;
    return this.http.get<any>(path);
  }

  getAllFutureGymkanas(){
    const path = `${this.api}/gymkanas_instances_active`;
    return this.http.get<any>(path);
  }
  getTests(id:string){
    const path = `${this.api}/tests/${id}`;
    return this.http.get<any>(path);
  }
  getSingleTest(id:string){
    const path = `${this.api}/test/${id}`;
    return this.http.get<any>(path);
  }

 
  storeAnwser(idGroup:number, id_test:number, id_gymkana:number, answer:string, test:Test){
    console.log("storeAn");
    let testScore = test.score;
    let testReview = test.review;
    let testAcceptance_criteria = test.acceptance_criteria;
    let score:number = 0;
    let checkup:number = 0;
    if(testReview == 0){
      if(testAcceptance_criteria == answer){
        score = testScore;
      }
    }else{
      checkup = 1;
    }
    let date = new Date();
    let start_date:any = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate()
      +" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
    console.log("idGroup"+idGroup);
    console.log("id_test"+id_test);
    console.log("id_gymkana"+id_gymkana);
    console.log("answer"+answer);
    console.log("score"+score);
    console.log("checkup"+checkup);
    console.log("start_date"+start_date);
    console.log("start_date"+start_date);
    //Mejorar controlando las fechas de inicio y fin con una con una peticion a la api

    this.http.post<any>('http://127.0.0.1:8000/api/group_test/', {
      'id_group': idGroup,
      'id_test': id_test,
      'id_gymkana': id_gymkana,
      'answer': answer,
      'score': score,
      'checkup': checkup,
      'start_date': start_date,
      'finish_date': start_date,
    }).subscribe(data => {
      // console.log(data);
    });
  }
  storeInscription(id_gymkana:number, id_participant:number, observations:string){
    let date = new Date();
    let dateNow = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate()
      +" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
    this.http.post<any>('http://127.0.0.1:8000/api/inscription/', {
      'id_gymkana_instance': id_gymkana,
      'id_participant': id_participant,
      'date': dateNow,
      'observations': observations,
      'checkup': 0,
    }).subscribe(data => {
      // console.log(data);
    });
  }

  getTestByIdGymkana(id_gymkana:number){
    const path = `${this.api}/gettests/${id_gymkana}`;
    return this.http.get<any>(path);
  }
  getResponsesByIdTest(id_group:number, id_gymkana:number){
    const path = `${this.api}/getresponses/${id_group}/${id_gymkana}`;
    return this.http.get<any>(path);
  }

  getNameGymkanaById(id:number){
    const path = `${this.api}/getnamegymkanabyid/${id}`;
    return this.http.get<any>(path);
  }
  
  getGymkanaByIdInstancia(id:number){
    const path = `${this.api}/getgymkanabyidinstancia/${id}`;
    return this.http.get<any>(path);
  }
  
  createParticipant( id_gymkana:number , id_group:number){
    
    this.http.post<any>('http://127.0.0.1:8000/api/createparticipant/', {
      'id_gymkana_instance': id_gymkana,
      'id_group': id_group,
     
    }).subscribe(data => {
      // console.log(data);
    });
  }

  getShowParticipant(id_gymkana_instance:number, id_group:number){
    const path = `${this.api}/getshowparticipant/${id_gymkana_instance}/${id_group}`;
    return this.http.get<any>(path);

  }

  // LIADO INSCRIPCIONES CON PARTICIPANTES

  showParticipant( id_gymkana_instance:number , id_group:number){
    this.http.post<any>('http://127.0.0.1:8000/api/setparticipant/', {
      'id_gymkana_instance': id_gymkana_instance,
      'id_group': id_group,
    })
  }
  //get Participant
  //front
  // DATASERVICE:CREAR METODO QUE DEVUELVA PARTICIPANTE -> ARG(GYMKANA_INSTANCE, ID_GROUP) X
  // CREAR METODO EN TYPESCRIPT DE SINGLEINSCRIPTION QUE EJECUTE EL MéTODO DE DATA SERVICE

  //back
  // CREAR RUTA EN LA API (post)
  // CREAR METODO EN EL CONTROLADOR DE PARTICIPANTES DE LA API  
}
