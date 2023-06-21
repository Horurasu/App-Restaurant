import { Component, OnInit } from '@angular/core';


import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  constructor(
    private router: Router,
  ) { }

  ngOnInit() {
  }


  async cargar_pagina_menu() {
    this.router.navigate(['home']);
  }

}
