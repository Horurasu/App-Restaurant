import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'login',
    loadChildren: () => import('./login/login.module').then( m => m.LoginPageModule)
  },
  {
    path: '',
    redirectTo: 'login',
    pathMatch: 'full'
  },
  {
    path: 'ramen',
    loadChildren: () => import('./modals/ramen/ramen.module').then( m => m.RamenPageModule)
  },
  {
    path: 'sushi',
    loadChildren: () => import('./modals/sushi/sushi.module').then( m => m.SushiPageModule)
  },
  {
    path: 'drink',
    loadChildren: () => import('./modals/drink/drink.module').then( m => m.DrinkPageModule)
  },
  {
    path: 'dessert',
    loadChildren: () => import('./modals/dessert/dessert.module').then( m => m.DessertPageModule)
  },
  {
    path: 'extra',
    loadChildren: () => import('./modals/extra/extra.module').then( m => m.ExtraPageModule)
  },
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
