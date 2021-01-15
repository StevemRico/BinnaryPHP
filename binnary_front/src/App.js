import './App.css';
import { BrowserRouter, Switch, Route, Redirect } from 'react-router-dom';
import Login from './components/Login';
import Register from './components/Register';
import HeaderComponent from './components/Header';
import Home from './views/Home';
import FooterComponent from './components/Footer';
import { useLocalStorage } from './hooks/useLocalStorage';
function App() {
  const [Token, setToken] = useLocalStorage('token', '');
  return (
    <>
      <BrowserRouter>
        <HeaderComponent />
        <Switch>
          <Route exact path='/Login' component={Login} />
          <Route exact path='/Register' component={Register} />
          <Route exact path='/' component={Home} />
        </Switch>
        <FooterComponent />
      </BrowserRouter>
    </>
  );
}

export default App;
