import './App.css';
import { BrowserRouter as Router, Switch, Route} from "react-router-dom";
import Login from './views/Login';
import Register from './views/Register';
import HeaderComponent from './components/header';

function App() {
  return (
    <>
      <Router>
        <HeaderComponent/>
        <Switch>
          <Route exact path="/Login">
            <Login />
          </Route>
          <Route exact path="/Register">
            <Register />
          </Route>
        </Switch>
      </Router>
    </>
  );
}

export default App;
