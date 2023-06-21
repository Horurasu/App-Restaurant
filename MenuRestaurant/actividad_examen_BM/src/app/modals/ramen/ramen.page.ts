import { Component, OnInit } from '@angular/core';
import { AlertController, ModalController } from '@ionic/angular';
import { HttpClient } from '@angular/common/http';
import { ToastController } from '@ionic/angular';
import Swal from 'sweetalert2';


@Component({
  selector: 'app-ramen',
  templateUrl: './ramen.page.html',
  styleUrls: ['./ramen.page.scss'],
})
export class RamenPage implements OnInit {

  ramens=[];

  constructor(
    private http : HttpClient,
    public alertController: AlertController,
    public modalController: ModalController,
    private toastCtrl : ToastController
  ) { }

  ngOnInit() {
    this.loadRamens();
  }

  closeModal(){
    this.modalController.dismiss();
  }


  loadRamens(){
    
    this.http.get<any>('http://localhost/ACTIVIDAD_EXAMEN_7_TERM/actividad_examen_BEM/back_end_moviles/tablas/api/Ramen')
    .subscribe(response => {
        this.ramens  = response.data;
      console.log(response);
    }); 

  }


  async mostrar_alerta(titulo, mensaje, posicion, color){
    let toast = await this.toastCtrl.create({
      header : titulo,
      message : mensaje,
      color : color,
      position : posicion,
      duration : 2500
    });

    await toast.present();
  }


  async new_ramen(){
    const alert = await this.alertController.create({
      header : "ADD",
      inputs : [
        
        {
          name : "nombre",
          type : "text",
          placeholder : "Name"
        },

        {
          name : "subnombre",
          type : "text",
          placeholder : "Sub nombre"
        },

        {
          name : "precio",
          type : "number",
          placeholder : "Price"
        },
        {
          name : "descripcion",
          type : "textarea",
          placeholder : "Descripcion"
        },

        
        
      ],
      buttons: [
        {
          text: 'Cancelar',
          role: 'cancel',
          cssClass: 'danger',
          
        }, {
          text: 'Guardar',
          cssClass: 'primary',
          handler : (data) => {
            //console.log(data);
            console.log(data);
            this.http.post<any>(
              "http://localhost/ACTIVIDAD_EXAMEN_7_TERM/actividad_examen_BEM/back_end_moviles/tablas/api/Ramen",
              data
            ).subscribe(response => {

              if (response.status == "1") {
              
                //this.mostrar_alerta("the item has been added successfully","", "middle", "success");
                
                Swal.fire({
                  title:"",
                  icon:"success",
                  padding: "1em",
                  text: "the item has been added successfully",
                  background: "#000",
                  //grow: "fullscreen",
                  backdrop: false,
                  footer: "",
                  timer: 5000,
                  //timerProgressBar: true,
                  //toast: true,
                 }
                );
                
                this.loadRamens();
              
              }else{

                Swal.fire({
                  title:"",
                  icon:"error",
                  padding: "1em",
                  text: "Error adding",
                  background: "#000",
                  //grow: "fullscreen",
                  backdrop: false,
                  footer: "",
                  timer: 5000,
                  //timerProgressBar: true,
                  //toast: true,
                 }
                );
                
              }
              console.log(response);
              },error => {
                Swal.fire({
                  title:"",
                  icon:"error",
                  padding: "1em",
                  text: "Error adding",
                  background: "#000",
                  //grow: "fullscreen",
                  backdrop: false,
                  footer: "",
                  timer: 5000,
                  //timerProgressBar: true,
                  //toast: true,
                 }
                );
                console.log("error");
                
            }); 
        
          }
        },
        

      ]


    });
    await alert.present();
  }


  async editar_ramen(ramen){
    const alert = await this.alertController.create({
      header : "Edit",
      inputs : [
        
        {
          name : "nombre",
          type : "text",
          placeholder : "Name",
          value : ramen.nombre
        },

        {
          name : "subnombre",
          type : "textarea",
          placeholder : "sub nombre",
          value : ramen.subnombre
        },

        {
          name : "precio",
          type : "number",
          placeholder : "Price",
          value : ramen.precio
        },

        {
          name : "descripcion",
          type : "textarea",
          placeholder : "Descripcion",
          value : ramen.descripcion
        },
        
        
        
      ],
      buttons: [
        {
          text: 'Cancelar',
          role: 'cancel',
          cssClass: 'danger',
          
        }, {
          text: 'Guardar',
          cssClass: 'primary',
          handler : (data) => {
            //console.log(data);
            console.log(data);
            this.http.put<any>(
              "http://localhost/ACTIVIDAD_EXAMEN_7_TERM/actividad_examen_BEM/back_end_moviles/tablas/api/Ramen/id/"+ramen.id,
              data
            ).subscribe(response => {

              if (response.status == "1") {
                Swal.fire({
                  title:"",
                  icon:"success",
                  padding: "1em",
                  text: "the item has been edited successfully",
                  background: "#000",
                  //grow: "fullscreen",
                  backdrop: false,
                  footer: "",
                  timer: 5000,
                  //timerProgressBar: true,
                  //toast: true,
                 }
                );
                this.loadRamens();
              
              }else{
                Swal.fire({
                  title:"",
                  icon:"error",
                  padding: "1em",
                  text: "Error while editing",
                  background: "#000",
                  //grow: "fullscreen",
                  backdrop: false,
                  footer: "",
                  timer: 5000,
                  //timerProgressBar: true,
                  //toast: true,
                 }
                );
                
              }
              console.log(response);
              },error => {
                Swal.fire({
                  title:"",
                  icon:"error",
                  padding: "1em",
                  text: "Error while editing",
                  background: "#000",
                  //grow: "fullscreen",
                  backdrop: false,
                  footer: "",
                  timer: 5000,
                  //timerProgressBar: true,
                  //toast: true,
                 }
                );
                console.log("error");
                
            }); 
        
          }
        },

      ]


    });
    await alert.present();
  }



  async mostrar_ramen(ramen){
    const alert = await this.alertController.create({
      header : "Description",
      message: ramen.descripcion,
      buttons: [

        {
          text: 'OK',
          role: 'cancel',
          cssClass: 'success',
          
        }, 
      ]

    });
    await alert.present();
  }


  async borrar_ramen(ramen){
    const alert = await this.alertController.create({
      header : "Do you want erase?",
      inputs : [
        
      ],
      buttons: [
        {
          text: 'NO',
          role: 'cancel',
          cssClass: 'danger',
          
        }, 
        {
          text: 'YES',
          cssClass: 'danger',
          handler : (data)=> {
            console.log(2);
            this.http.delete<any>(
              "http://localhost/ACTIVIDAD_EXAMEN_7_TERM/actividad_examen_BEM/back_end_moviles/tablas/api/Ramen/id/"+ramen.id,
            ).subscribe(response => {

              if (response.status == "1") {
                //Swal.fire("","the item has been deleted successfully","success");
                Swal.fire({
                  title:"",
                  icon:"success",
                  padding: "1em",
                  text: "the item has been deleted successfully",
                  background: "#000",
                  //grow: "fullscreen",
                  backdrop: false,
                  footer: "",
                  timer: 5000,
                  //timerProgressBar: true,
                  //toast: true,

                 }
                );
                this.loadRamens();
              
              }else{
                Swal.fire("","Error when deleting","error");
                
              }
              console.log(response);
              },error => {
                Swal.fire("","Error when deleting","error");
                console.log("error");
                
            });
          }
          
        },

      ]


    });
    await alert.present();
  }


}
