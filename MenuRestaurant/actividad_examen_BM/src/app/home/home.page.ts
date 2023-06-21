import { Component } from '@angular/core';
import { AlertController } from '@ionic/angular';
import { ModalController } from '@ionic/angular';

import { HttpClient } from '@angular/common/http';
import { ToastController } from '@ionic/angular';


import { Router, ActivatedRoute } from '@angular/router';

import { RamenPage } from '../modals/ramen/ramen.page';
import { SushiPage } from '../modals/sushi/sushi.page';
import { DrinkPage } from '../modals/drink/drink.page';
import { DessertPage } from '../modals/dessert/dessert.page';
import { ExtraPage } from '../modals/extra/extra.page';


@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {



  constructor(
    private http : HttpClient,
    public alertController: AlertController,
    public modalController: ModalController,
    private toastCtrl : ToastController,
    private router: Router,
    private route: ActivatedRoute
    
  ) {}

  async cargar_login() {
    this.router.navigate(['login']);
  }

  async cargar_ramen() {
    const modal = await this.modalController.create({
      component: RamenPage,
      cssClass: 'my-custom-class'
    });
    return await modal.present();
  }

  async cargar_sushi() {
    const modal = await this.modalController.create({
      component: SushiPage,
      cssClass: 'my-custom-class'
    });
    return await modal.present();
  }

  async cargar_bebida() {
    const modal = await this.modalController.create({
      component: DrinkPage,
      cssClass: 'my-custom-class'
    });
    return await modal.present();
  }

  async cargar_postre() {
    const modal = await this.modalController.create({
      component: DessertPage,
      cssClass: 'my-custom-class'
    });
    return await modal.present();
  }

  async cargar_extra() {
    const modal = await this.modalController.create({
      component: ExtraPage,
      cssClass: 'my-custom-class'
    });
    return await modal.present();
  }



  

}
