import './App.css';
import { BrowserRouter, Switch, Route, Redirect, Link } from 'react-router-dom';
import Login from './components/Login';
import Register from './components/Register';
import HeaderComponent from './components/Header';
import Home from './views/Home';
import FooterComponent from './components/Footer';
import { useLocalStorage } from './hooks/useLocalStorage';
import Sidebar from './components/Sidebar';
import Messages from './views/Messages';
import PublicationUnique from './components/PublicationUnique';
import Profile from './components/Profile';
import PostPublication from './components/PostPublication';

function App() {
  const [Token, setToken] = useLocalStorage('token', '');

  if (Token === '') {
    return (
      <>
        <BrowserRouter>
          <HeaderComponent />
          <Switch>
            <Route exact path='/Login' component={Login} />
            <Route exact path='/Register' component={Register} />
            <Route exact path='/Home' component={Home} />
          </Switch>
          {/* <FooterComponent /> */}
        </BrowserRouter>
      </>
    )
  } else {

    return (
      <>
        <BrowserRouter>
          <HeaderComponent />
          <Sidebar />
          <Switch>
            <Route exact path='/Login' component={Login} />
            <Route exact path='/Register' component={Register} />
            <Route exact path='/Messages' component={Messages} />
            <Route exact path='/Home' component={Home} />
            <Route exact path='/Publication/:id' component={PublicationUnique} />
            <Route exact path='/Profile' component={Profile} />
            <Route exact path='/PostPublications' component={PostPublication} />
          </Switch>
          {/* <FooterComponent /> */}
        </BrowserRouter>
      </>
    );
  }

}

export default App;