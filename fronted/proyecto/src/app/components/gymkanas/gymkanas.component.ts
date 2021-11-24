import { Component, OnInit } from '@angular/core';
import { HomeComponent } from '../home/home.component';
import { AuthService } from 'src/app/services/auth/auth.service';
import { UserService } from 'src/app/services/user.service';
import { DataService } from 'src/app/services/data.service';
import { MatTableDataSource } from '@angular/material/table';
import { Router } from '@angular/router';
import { Gymkana } from 'src/app/models/Gymkana';

@Component({
  selector: 'app-gymkanas',
  templateUrl: './gymkanas.component.html',
  styleUrls: ['../home/home.component.html', './gymkanas.component.scss']
})
export class GymkanasComponent extends HomeComponent implements OnInit {
  gymkanas: Gymkana[] = [];
  dataSource = new MatTableDataSource<Gymkana>([]);
  displayedColumns: string[] = ['observations', 'description', 'start_date', 'finish_date', 'actions'];
  constructor(
    public authService: AuthService,
    public userService: UserService,
    public dataService: DataService,
    public router: Router,
  ) {
    super(authService, userService, router);
  }

  ngOnInit(): void {
    this.createTable();
  }

  createTable() {
    // this.dataService.getAllActivesGymkanas().subscribe(res => {
    this.dataService.getAllFutureGymkanas().subscribe(res => {
      this.gymkanas = res;
      this.dataSource = new MatTableDataSource<Gymkana>(this.gymkanas);
    });
  }

  startGymkana(element: Gymkana) {
    this.router.navigate([`/tests/${element.id_gymkana}`]);
  
  }
}
