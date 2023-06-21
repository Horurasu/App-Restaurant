import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouteReuseStrategy } from '@angular/router';

import { IonicModule, IonicRouteStrategy } from '@ionic/angular';

import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';

//---------------------
//importar las librerias de http de angular para usar la coneccion de la base de datos

import { HttpClientModule } from '@angular/common/http';

//---------------------x

@NgModule({
  declarations: [AppComponent],
  entryComponents: [],
  //en la parte agregar el HttpClientModule ala parte de los imports
  imports: [
    
    BrowserModule, 
    IonicModule.forRoot(),
    AppRoutingModule, 
    HttpClientModule

  ],
  providers: [{ provide: RouteReuseStrategy, useClass: IonicRouteStrategy }],
  bootstrap: [AppComponent],

})
export class AppModule {}
