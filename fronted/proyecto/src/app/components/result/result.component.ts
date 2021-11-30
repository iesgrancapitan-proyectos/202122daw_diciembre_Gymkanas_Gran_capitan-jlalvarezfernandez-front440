import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth/auth.service';
import { UserService } from 'src/app/services/user.service';
import { DataService } from 'src/app/services/data.service';
import { HomeComponent } from '../home/home.component';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-result',
  templateUrl: './result.component.html',
  styleUrls: ['../home/home.component.html','./result.component.scss']
})
export class ResultComponent extends HomeComponent implements OnInit {
  score:number;
  checkup:boolean = false;
  puntuacionOnline = 1;
  id_gymkana: number;
  constructor(
    public authService:AuthService,
    public userService:UserService,
    public dataService:DataService,
    public router:Router,
    private route:ActivatedRoute,
  ) {
    super(authService, userService, router);
  }

  ngOnInit(): void {
    this.getDatos();
  }
  getDatos(){
    this.route.params.subscribe(params => {
      
      this.score = params.score;
      // if(params['score']){
      //   console.log(this.score);
      // }
      this.checkup = params.checkup;
      this.puntuacionOnline = params.puntuacionOnline;
      this.id_gymkana = params.id_gymkana;
    });
  }
  goBack(id_gymkana:number) {
    this.router.navigate([`/tests/${this.id_gymkana}`]);
   
    }
}
