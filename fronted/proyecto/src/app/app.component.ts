import { Component, HostListener, OnInit, OnDestroy } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnDestroy, OnInit{
  title = 'Gymkanas';

  constructor(){}
  ngOnInit(){
  }
  ngOnDestroy(): void {
  //   localStorage.removeItem("email");
  //   localStorage.removeItem("profilePhoto");
  }
  // @HostListener('window:unload', ['$event'])unloadHandler(event){
  //   localStorage.removeItem("email");
  //   localStorage.removeItem("profilePhoto");
  // }
  // @HostListener('window:beforeunload', ['$event'])beforeUnloadHandler(event){
  //   localStorage.removeItem("email");
  //   localStorage.removeItem("profilePhoto");
  // }
}
