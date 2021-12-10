import { Component, OnInit, Output, EventEmitter, Input } from '@angular/core';
import { AuthService } from 'src/app/services/auth/auth.service';
import { UserService } from 'src/app/services/user.service';
import { DataService } from 'src/app/services/data.service';
import { HomeComponent } from '../home/home.component';
import { ActivatedRoute, Router } from '@angular/router';
import { Test } from 'src/app/models/Test';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';


@Component({
  selector: 'app-single-test',
  templateUrl: './single-test.component.html',
  styleUrls: ['../home/home.component.html','./single-test.component.scss']
})
export class SingleTestComponent extends HomeComponent implements OnInit {
  test:Test;
  photo:boolean;
  answer: string;
  @Output() valueResponse:EventEmitter<boolean> = new EventEmitter<boolean>();
  @Input() fromTest = true;
  id:number;
  idTest:number;
  form: FormGroup;
  myName:string= "";
  myDescription:string= "";
  loading:boolean = false;
  constructor(
    public authService:AuthService,
    public userService:UserService,
    public dataService:DataService,
    public router:Router,
    private route:ActivatedRoute,
    public formBuilder:FormBuilder,
    ) {
      super(authService, userService, router);
    }
    
  ngOnInit(): void {
    
    this.createForm();
    this.showSingleTest();    
  }

  addNumTest(){
    this.valueResponse.emit(true);
  }

  createForm(){
    this.form = this.formBuilder.group({
      // response:['', Validators.required]  // ORIGINAL
      response:['']
    })
  }

  showSingleTest(){
    this.route.params.subscribe(params => {
      if(params['id']){        
        this.dataService.getSingleTest(params['id']).subscribe(res => {
          this.test = res[0];          
          this.myName = this.test.name;
          this.myDescription = this.test.description;
          this.idTest = this.test.id;
          this.id = this.test.id_gymkana;
          
          if(this.test.photo !== ''){
            this.photo = true;
          }else{
            this.photo = false;
          }
        })
      }
    });
  }
  sendAnswer(id_gymkana:number){
    this.loading = true;
    this.answer = (document.getElementById('answer') as HTMLInputElement).value;
    this.userService.getIdGroup(parseInt(localStorage.getItem("id"))).subscribe(data => {
      if(data){
        data.forEach(result => {
          this.userService.getIdParticipant(result.id_group).subscribe(participant => {
            participant.forEach(part => {
              this.userService.getInscription(part.id_gymkana_instance, part.id).subscribe(inscription => { 
                if(inscription.length == 1){
                  this.userService.getParticipantById(inscription[0].id_participant).subscribe(res => {
                    if(res){
                      localStorage.setItem("idGroup", res[0].id_group);
                      this.dataService.storeAnwser(parseInt(localStorage.getItem("idGroup")) , this.idTest, id_gymkana, this.answer, this.test);
                       this.router.navigate([`/tests/${id_gymkana}`]);
                      this.addNumTest();
                    }
                  }, err => {
                      console.log("No se encontró el id del grupo")
                  });
                  this.loading = false;
                }
              });
            });
          })
        });
      }
    });
  }
  goBack(id_gymkana:number) {
    this.router.navigate([`/tests/${id_gymkana}`]);
   
    }
}
