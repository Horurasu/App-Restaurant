import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RamenPageRoutingModule } from './ramen-routing.module';

import { RamenPage } from './ramen.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RamenPageRoutingModule
  ],
  declarations: [RamenPage]
})
export class RamenPageModule {}
