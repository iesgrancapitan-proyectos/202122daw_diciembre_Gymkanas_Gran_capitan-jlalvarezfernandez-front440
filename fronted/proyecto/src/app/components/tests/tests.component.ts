import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth/auth.service';
import { UserService } from 'src/app/services/user.service';
import { DataService } from 'src/app/services/data.service';
import { HomeComponent } from '../home/home.component';
import { ActivatedRoute, Router } from '@angular/router';
import { Test } from 'src/app/models/Test';

@Component({
  selector: 'app-tests',
  templateUrl: './tests.component.html',
  styleUrls: ['../home/home.component.html','./tests.component.scss']
})
export class TestsComponent extends HomeComponent implements OnInit {
  tests:Test[]=[];
  answer:number = 0;
  checkup:boolean = false;
  score:number = 0;
 
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
    this.showTestGymkana();
    this.idGroup = parseInt(localStorage.getItem("idGroup"));
  }
  showTestGymkana(){
    this.route.params.subscribe(params => {
      if(params['id']){
        this.dataService.getTests(params['id']).subscribe((res:Test[]) => {
          this.tests = res;
          this.tests.forEach(test => {
            this.getResponses(test);
          })
        });
      }
    });
    
  }
  makeTest(test:Test){
    this.router.navigate([`/test/${test.id}`]);
  }
  getResponses(test:Test){
    this.checkup = false;
    this.dataService.getResponsesByIdTest(this.idGroup, test.id).toPromise().
    then(res => {
      if(res.length > 0){
        this.answer+=1;
      }
      if(res[0].checkup == 1){
        this.checkup = true;
      }else{
        this.score+=res[0].score;
      }
      if(this.answer == this.tests.length){
        this.router.navigate([`/result/${this.score}/${this.checkup}`]);
      }
    }).catch(() => {});
  }
}
