import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { SushiPageRoutingModule } from './sushi-routing.module';

import { SushiPage } from './sushi.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SushiPageRoutingModule
  ],
  declarations: [SushiPage]
})
export class SushiPageModule {}
