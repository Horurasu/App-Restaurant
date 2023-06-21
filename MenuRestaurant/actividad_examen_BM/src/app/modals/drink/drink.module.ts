import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { DrinkPageRoutingModule } from './drink-routing.module';

import { DrinkPage } from './drink.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    DrinkPageRoutingModule
  ],
  declarations: [DrinkPage]
})
export class DrinkPageModule {}
