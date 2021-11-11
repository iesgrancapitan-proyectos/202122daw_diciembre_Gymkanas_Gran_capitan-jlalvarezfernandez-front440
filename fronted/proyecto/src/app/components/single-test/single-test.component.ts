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
    private router:Router,
    private route:ActivatedRoute,
    public formBuilder:FormBuilder,
    ) {
      super(authService, userService);
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
      response:['', Validators.required]
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
          console.log(this.id);
          
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
    console.log("entrando en single test");

    this.loading = true;
    this.answer = (document.getElementById('answer') as HTMLInputElement).value;
    
    this.userService.getIdGroup(parseInt(localStorage.getItem("id"))).subscribe(data => {
      console.log(data);
      if(data){
        

        data.forEach(data => {
          this.userService.getIdParticipant(data.id_group).subscribe(participant => {
            console.log(data.id_group);
            participant.forEach(part => {
              console.log(id_gymkana);
              console.log(part.id);
              
              this.userService.getInscription(id_gymkana, part.id).subscribe(inscription => {
                console.log(inscription);
                
                if(inscription.length == 1){
                  console.log(2);
                  this.userService.getParticipantById(inscription[0].id_participant).subscribe(res => {
                    if(res){
                      console.log(3);
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
}
