import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GymkanasComponent } from './gymkanas.component';

describe('GymkanasComponent', () => {
  let component: GymkanasComponent;
  let fixture: ComponentFixture<GymkanasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GymkanasComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GymkanasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
