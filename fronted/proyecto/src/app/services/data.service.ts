import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { map, catchError } from 'rxjs/operators';
import { UserService } from '../services/user.service';
import { Test } from '../models/Test';

@Injectable({
  providedIn: 'root'
})
export class DataService {

  // private api = 'http://127.0.0.1:8000/api';
  private api = 'http://frontyincanas.iesgrancapitan.org/api';

  constructor(
    private http: HttpClient,
    private userService: UserService
  ) { }

  getAllActivesGymkanas() {
    const path = `${this.api}/gymkanas_instances_future`;
    return this.http.get<any>(path);
  }

  getAllFutureGymkanas() {
    const path = `${this.api}/gymkanas_instances_active`;
    return this.http.get<any>(path);
  }
  getTests(id: string) {
    const path = `${this.api}/tests/${id}`;
    return this.http.get<any>(path);
  }
  getSingleTest(id: string) {
    const path = `${this.api}/test/${id}`;
    return this.http.get<any>(path);
  }


  storeAnwser(idGroup: number, id_test: number, id_gymkana: number, answer: string, test: Test) {
    let testScore = test.score;
    let testReview = test.review;
    let testAcceptance_criteria = test.acceptance_criteria;
    let score: number = 0;
    let checkup: number = 0;
    if (testReview == 0) {
      if (testAcceptance_criteria == answer) {
        score = testScore;
      }
    } else {
      checkup = 1;
    }
    let date = new Date();
    let start_date: any = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate()
      + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();

    this.http.post<any>(`${this.api}/group_test/`, {
      'id_group': idGroup,
      'id_test': id_test,
      'id_gymkana': id_gymkana,
      'answer': answer,
      'score': score,
      'checkup': checkup,
      'start_date': start_date,
      'finish_date': start_date,
    }).subscribe(data => {
    });
  }
  storeInscription(id_gymkana: number, id_participant: number, observations: string) {
    let date = new Date();
    let dateNow = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate()
      + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
    this.http.post<any>(`${this.api}/inscription/`, {
      'id_gymkana_instance': id_gymkana,
      'id_participant': id_participant,
      'date': dateNow,
      'observations': observations,
      'checkup': 0,
    }).subscribe(data => {
    });
  }

  getTestByIdGymkana(id_gymkana: number) {
    const path = `${this.api}/gettests/${id_gymkana}`;
    return this.http.get<any>(path);
  }
  getResponsesByIdTest(id_group: number, id_gymkana: number) {
    const path = `${this.api}/getresponses/${id_group}/${id_gymkana}`;
    return this.http.get<any>(path);
  }

  getNameGymkanaById(id: number) {
    const path = `${this.api}/getnamegymkanabyid/${id}`;
    return this.http.get<any>(path);
  }

  getGymkanaByIdInstancia(id: number) {
    const path = `${this.api}/getgymkanabyidinstancia/${id}`;
    return this.http.get<any>(path);
  }

  createParticipant(id_gymkana: number, id_group: number) {

    this.http.post<any>(`${this.api}/createparticipant/`, {
      'id_gymkana_instance': id_gymkana,
      'id_group': id_group,

    }).subscribe(data => {
    });
  }

  getShowParticipant(id_gymkana_instance: number, id_group: number) {
    const path = `${this.api}/getshowparticipant/${id_gymkana_instance}/${id_group}`;
    return this.http.get<any>(path);

  }


  showParticipant(id_gymkana_instance: number, id_group: number) {
    this.http.post<any>(`${this.api}/setparticipant/`, {
      'id_gymkana_instance': id_gymkana_instance,
      'id_group': id_group,
    })
  }

  getCurrentScore() {
    const path = `${this.api}/getcurrentscore`;
    return this.http.get<any>(path);
  }
   
}
