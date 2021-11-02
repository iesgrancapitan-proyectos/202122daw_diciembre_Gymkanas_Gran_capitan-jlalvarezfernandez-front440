import { CUSTOM_ELEMENTS_SCHEMA, NgModule, NO_ERRORS_SCHEMA } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AngularFireModule } from '@angular/fire';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './components/login/login.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MaterialModule } from './material/material.module';
import { DataService } from './services/data.service';
import { AuthService } from './services/auth/auth.service';
import { UserService } from './services/user.service';
import { environment } from 'src/environments/environment';
import { HomeComponent } from './components/home/home.component';
import { AuthGuardComponent } from './components/auth-guard/auth-guard.component';
import { GymkanasComponent } from './components/gymkanas/gymkanas.component';
import { HttpClientModule } from '@angular/common/http';
import { TestsComponent } from './components/tests/tests.component';
import { SingleTestComponent } from './components/single-test/single-test.component';
import { ReactiveFormsModule } from '@angular/forms';
import { InscriptionsComponent } from './components/inscriptions/inscriptions.component';
import { ServiceWorkerModule } from '@angular/service-worker';
import { SingleInscriptionComponent } from './components/single-inscription/single-inscription.component';
import { ResultComponent } from './components/result/result.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    LoginComponent,
    GymkanasComponent,
    TestsComponent,
    SingleTestComponent,
    InscriptionsComponent,
    SingleInscriptionComponent,
    ResultComponent,
    
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MaterialModule,
    AngularFireModule,
    AngularFireModule.initializeApp(environment.firebase),
    HttpClientModule,
    ReactiveFormsModule,
    ServiceWorkerModule.register('ngsw-worker.js', {
      enabled: environment.production,
      // Register the ServiceWorker as soon as the app is stable
      // or after 30 seconds (whichever comes first).
      registrationStrategy: 'registerWhenStable:300000',
    }),
  ],
  providers: [DataService, AuthService, UserService, AuthGuardComponent],
  bootstrap: [AppComponent],
  schemas: [CUSTOM_ELEMENTS_SCHEMA, NO_ERRORS_SCHEMA]
})
export class AppModule { }
