import { useState } from 'react'
import ky from 'ky'
import './App.css'

function App() {
  const [posts, setPosts] = useState([])

  async function retrievePosts () {
    const payload = await ky.get('http://localhost:8000/api/posts').json();
    setPosts(payload);
  }

  return (
    <div className="App">
      <header className="App-header">
          <button type="button" onClick={retrievePosts}>Load posts</button>
      </header>
      <main>
        {posts && posts.map((post) => (
          <div key={post.id}>
            <h2>{post.title}</h2>
            <div>{post.content}</div>
            <time>Créé : {post.createdAt}</time>
            <time>Modifié : {post.updatedAt}</time>
          </div>
        ))}
      </main>
    </div>
  )
}

export default App
