import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { DessertPageRoutingModule } from './dessert-routing.module';

import { DessertPage } from './dessert.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    DessertPageRoutingModule
  ],
  declarations: [DessertPage]
})
export class DessertPageModule {}
