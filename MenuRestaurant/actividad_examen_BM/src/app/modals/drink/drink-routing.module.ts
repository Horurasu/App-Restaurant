import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { DrinkPage } from './drink.page';

const routes: Routes = [
  {
    path: '',
    component: DrinkPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class DrinkPageRoutingModule {}
