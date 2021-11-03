import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs'

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  posts: any = [];

  constructor (private http: HttpClient) {}

  retrievePosts() {
    this.http.get('http://localhost:8000/api/posts').subscribe((data: any) => {
      this.posts = data['hydra:member'] as any;
    })
  }
}
