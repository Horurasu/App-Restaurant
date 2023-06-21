import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { RamenPage } from './ramen.page';

const routes: Routes = [
  {
    path: '',
    component: RamenPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class RamenPageRoutingModule {}
