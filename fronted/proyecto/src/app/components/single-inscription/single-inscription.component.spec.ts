import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SingleInscriptionComponent } from './single-inscription.component';

describe('SingleInscriptionComponent', () => {
  let component: SingleInscriptionComponent;
  let fixture: ComponentFixture<SingleInscriptionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SingleInscriptionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SingleInscriptionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
