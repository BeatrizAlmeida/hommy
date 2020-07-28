import { Component, OnInit } from '@angular/core';

class Republic{  
  name: string;
  price: number;
  description: string;
  bedrooms: number;
  bathrooms: number;
  residentsNumber: number;
  street: string;
  houseNumber: number;
  neighborhood: string;
  city: string;
  imageRepublic: string;
  imageBedroom: string;
}
@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {
  republics: Republic [];

  constructor() { }

  ngOnInit() {
    this.republics =[{
      name: 'República do Sol',
      price: 350.00,
      description: 'Vaga em República com ótima localização, perto da universidade e com mercados e farmácias ao redor.',
      bedrooms: 1,
      bathrooms: 1,
      residentsNumber: 1,
      street: 'avenida Brás de Pina',
      houseNumber: 1110,
      neighborhood: 'Vila da Penha',
      city: 'Rio de Janeiro',
      imageRepublic :"../../assets/rep2.jpg" ,
      imageBedroom : "../../assets/bedroom-rep2.jpg" ,
    },
    {
      name: 'República doce lar',
      price: 450.00,
      description: 'Vaga em República com quarto confortável e aconchegante. Fica em bairro tranquilo e bem localizado.',
      bedrooms: 2,
      bathrooms: 1,
      residentsNumber: 3,
      street: 'Oscar Niemeyer',
      houseNumber: 1111,
      neighborhood: 'Boa Viagem',
      city: 'Niterói',
      imageRepublic :"../../assets/rep6.jpg",
      imageBedroom : "../../assets/bedroom-rep.jpg" ,
    },
    {
      name: 'República das flores',
      price: 400.00,
      description: 'Ótima república, venha fazer parte dos nossos moradores',
      bedrooms: 1,
      bathrooms: 1,
      residentsNumber: 1,
      street: 'avenida Maracanã',
      houseNumber: 1111,
      neighborhood: 'Maracanã',
      city: 'Rio de Janeiro',
      imageRepublic :"../../assets/rep3.jpg",
      imageBedroom : "../../assets/bedroom-rep3.jpg" ,

    },
    ];
  }

}
