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
  constructor(
    public authService:AuthService,
    public userService:UserService,
    public dataService:DataService,
    private router:Router,
    private route:ActivatedRoute,
  ) {
    super(authService, userService);
  }

  ngOnInit(): void {
    this.getDatos();
  }
  getDatos(){
    this.route.params.subscribe(params => {
      if(params['score']){
        this.score = params.score;
      }
      this.checkup = params['checkup'];
    });
  }
}
