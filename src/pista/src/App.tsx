import React, { Component, MouseEvent } from 'react';
import Input from '@material-ui/core/Input';
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemText from '@material-ui/core/ListItemText';
import ListItemSecondaryAction from '@material-ui/core/ListItemSecondaryAction';
import IconButton from '@material-ui/core/IconButton';
import EditIcon from '@material-ui/icons/Edit';

import './App.css';

interface ITodo {
  id: string;
  value: string;
}

interface IState {
  currentTodo: string;
  todos: ITodo[];
}

class App extends Component<{}, IState> {
  constructor(props: {}) {
    super(props);

    this.state = { currentTodo: '', todos: [] };
  }

  onChange = (
    event: React.FormEvent<HTMLInputElement | HTMLTextAreaElement>
  ) => {
    const value = event.currentTarget.value;
    this.setState(prevState => ({ ...prevState, currentTodo: value }));
  };

  addTodo = (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    const { currentTodo, todos } = this.state;

    todos.push({
      id: `${Math.floor(Math.random() * 10)}${currentTodo}`,
      value: currentTodo
    });

    this.setState(prevState => ({ ...prevState, currentTodo: '', todos }));
  };

  updateTodo = (todoId: string) => {
    const todo: ITodo = this.state.todos.find(todo => todo.id === todoId) || {
      id: '',
      value: ''
    };
    this.removeTodo(todoId);
    this.setState(prevState => ({ ...prevState, currentTodo: todo.value }));
  };

  removeTodo = (id: string) => {
    this.setState(prevState => {
      const todos = prevState.todos.filter(todo => todo.id !== id);

      return { ...prevState, todos };
    });
  };

  render() {
    const { currentTodo, todos } = this.state;

    return (
      <main className='app'>
        <form onSubmit={this.addTodo}>
          <Input
            autoFocus
            type='text'
            name='todo'
            placeholder='Todo'
            value={currentTodo}
            onChange={this.onChange}
          />
        </form>

        <List>
          {todos.map(todo => (
            <ListItem
              key={todo.id}
              button
              onClick={() => this.removeTodo(todo.id)}
            >
              <ListItemText primary={todo.value} />
              <ListItemSecondaryAction>
                <IconButton
                  aria-label='Edit'
                  onClick={() => this.updateTodo(todo.id)}
                >
                  <EditIcon />
                </IconButton>
              </ListItemSecondaryAction>
            </ListItem>
          ))}
        </List>
      </main>
    );
  }
}

export default App;
