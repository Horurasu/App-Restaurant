import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { SushiPage } from './sushi.page';

const routes: Routes = [
  {
    path: '',
    component: SushiPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class SushiPageRoutingModule {}
