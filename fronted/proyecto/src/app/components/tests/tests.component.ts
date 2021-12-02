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
  styleUrls: ['../home/home.component.html', './tests.component.scss']
})
export class TestsComponent extends HomeComponent implements OnInit {
  tests: Test[] = [];
  answer: number = 0;
  checkup: boolean = false;
  score: number = 0;
  id_gymkana: number;

  constructor(
    public authService: AuthService,
    public userService: UserService,
    public dataService: DataService,
    public router: Router,
    private route: ActivatedRoute,
  ) {
    super(authService, userService, router);
  }

  ngOnInit(): void {
    this.showTestGymkana();
    this.idGroup = parseInt(localStorage.getItem("idGroup"));

  }
  showTestGymkana() {
    this.route.params.subscribe(params => {
      this.id_gymkana = params['id'];

      if (params['id']) {
        this.dataService.getTests(params['id']).subscribe((res: Test[]) => {
          this.tests = res;
          this.tests.forEach(test => {
            this.getResponses(test);
          })
        });
      }
    });

  }


  makeTest(test) {
    this.router.navigate([`/test/${test.id}`]);
  }
  getResponses(tests) {
    this.checkup = false;
    let puntuacionOnline = 1; //1: no has acabado la gymkana, 0 que si
    this.dataService.getResponsesByIdTest(this.idGroup, tests.id).toPromise().
      then(res => {
        if (res.length > 0) {
          this.answer += 1;
        }
        if (res[0].checkup == 1) {
          this.checkup = true;
        } else {
          this.score += res[0].score;
        }
        if (this.answer == this.tests.length) { //todos los test estan respondidos
          puntuacionOnline = 0;
          this.router.navigate([`/result/${this.score}/${this.checkup}/${puntuacionOnline}/${this.id_gymkana}`]);
        }
      }).catch(() => { });
  }

  showOnlineScore(tests) {
    this.score = 0;
    tests.forEach(test => {
      this.dataService.getResponsesByIdTest(this.idGroup, test.id).toPromise().
        then(res => {
          if (res.length == 0) {
            this.router.navigate([`/result/${this.score}/${this.checkup}/1/${this.id_gymkana}`]);
          }

          if (res.length > 0) {
            this.answer += 1; //preguntas resueltas
          }
          if (res[0].checkup == 1) {
            this.checkup = true;
          } else {
            this.score += res[0].score;
          }
          if (this.answer == this.tests.length) { //todos los test estan respondidos

            // puntuacionOnline = 0;
            this.router.navigate([`/result/${this.score}/${this.checkup}/0`]); // VER PUNTACION FINAL
          } else {
            this.router.navigate([`/result/${this.score}/${this.checkup}/1/${this.id_gymkana}`]); // VER PUNTACION ONLINE
          }
        }).catch(() => { });
    });
  }

}
