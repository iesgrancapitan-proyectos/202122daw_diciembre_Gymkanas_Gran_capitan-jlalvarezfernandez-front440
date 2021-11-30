import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { LoginComponent } from './components/login/login.component';
import { AuthGuardComponent } from './components/auth-guard/auth-guard.component';
import { GymkanasComponent } from './components/gymkanas/gymkanas.component';
import { InscriptionsComponent } from './components/inscriptions/inscriptions.component';
import { TestsComponent } from './components/tests/tests.component';
import { SingleTestComponent } from './components/single-test/single-test.component';
import { SingleInscriptionComponent } from './components/single-inscription/single-inscription.component';
import { ResultComponent } from './components/result/result.component';

const routes: Routes = [
  {path: '', component:LoginComponent},
  {path: 'login', component:LoginComponent},
  {path: 'home', component:HomeComponent, canActivate:[AuthGuardComponent]},
  {path: 'gymkanas', component:GymkanasComponent, canActivate:[AuthGuardComponent]},
  {path: 'inscriptions', component:InscriptionsComponent, canActivate:[AuthGuardComponent]},
  {path: 'single-inscription/:id', component:SingleInscriptionComponent, canActivate:[AuthGuardComponent]},
  {path: 'result/:score/:checkup/:puntuacionOnline/:id_gymkana', component:ResultComponent, canActivate:[AuthGuardComponent]},
  {path: 'tests/:id', component:TestsComponent, canActivate:[AuthGuardComponent]},
  {path: 'test/:id', component:SingleTestComponent, canActivate:[AuthGuardComponent]},
  {path: '**', component:LoginComponent},
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
