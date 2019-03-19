let totalMoney = 0;
let startingMoney = 0;

function play() {
  const playBtnElem = document.querySelector('#play');
  const giveUpBtnElem = document.querySelector('#give-up');
  const throwDiceBtnElem = document.querySelector('#throw-dices');
  const subtitleElem = document.querySelector('#subtitle');
  const moneyElem = document.querySelector('#money');
  const betGroupElem = document.querySelector('.bet');

  playBtnElem.classList.add('hide');
  giveUpBtnElem.classList.add('hide');
  subtitleElem.classList.add('hide');

  throwDiceBtnElem.classList.remove('hide');
  betGroupElem.classList.remove('hide');

  moneyElem.readOnly = true;

  totalMoney = +moneyElem.value;
  startingMoney = +moneyElem.value;
}

function startGame() {
  const bet = +document.querySelector('#bet').value;

  if (bet > totalMoney) {
    document.getElementById('winner').classList.add('hide');
    document.getElementById('loser').classList.add('hide');
    document.getElementById('dices-list').classList.add('hide');
    document.getElementById('error').classList.remove('hide');
    return;
  }

  document.getElementById('error').classList.add('hide');

  const dices = [];

  let winner = false;
  let loser = false;
  let point = 0;

  do {
    const fdice = throwDice();
    const sdice = throwDice();
    dices.push([fdice, sdice]);

    const sum = fdice + sdice;

    if (!point) {
      if (sum === 7 || sum === 11) {
        winner = true;
      } else if ([2, 3, 12].includes(sum)) {
        loser = true;
      } else {
        point = sum;
      }
    } else {
      if (sum === 7) {
        loser = true;
      } else if (sum === point) {
        winner = true;
      }
    }
  } while (!winner && !loser);

  totalMoney = winner ? totalMoney + bet : totalMoney - bet;
  updateTotal();

  const msgIdShow = winner ? 'winner' : 'loser';
  const msgIdHide = !winner ? 'winner' : 'loser';
  document.getElementById(msgIdShow).classList.remove('hide');
  document.getElementById(msgIdHide).classList.add('hide');
  showDices(dices);

  document.querySelector('#give-up').classList.remove('hide');
}

function giveUp() {
  const profit = totalMoney - startingMoney;
  let msg = '';
  let cssClass = '';

  if (profit > 0) {
    msg = `Ganancia: ${profit}<br/>Ajuuuuaaaaaa<br/>Saldo total: ${totalMoney}`;
    cssClass = 'winner';
  } else {
    msg = `Saldo: ${totalMoney} de ${startingMoney} pesos. Perdiste ${profit *
      -1} :-(`;
    cssClass = 'loser';
  }

  const finalMsgElem = document.querySelector('#final-msg h3');
  finalMsgElem.classList.add(cssClass);
  finalMsgElem.innerHTML = msg;
  document.querySelector('#reload').classList.remove('hide');

  document.querySelector('#give-up').classList.add('hide');
  document.querySelector('#throw-dices').classList.add('hide');
  document.querySelector('#dices-list').classList.add('hide');
  document.querySelector('#winner').classList.add('hide');
  document.querySelector('#loser').classList.add('hide');
  document.getElementById('error').classList.add('hide');
}

function throwDice() {
  return Math.floor(Math.random() * 6) + 1;
}

function showDices(dices) {
  const html = dices
    .map(
      (dice, i) =>
        `<li>Lanzamiento ${i + 1} 
          <img src="../../resources/images/cd${dice[0]}.jpg" />
          <img src="../../resources/images/cd${dice[1]}.jpg" />
        </li>`
    )
    .join('');

  document.getElementById('dices-list').innerHTML = html;
}

function updateTotal() {
  document.querySelector('#money').value = totalMoney;
}

function reload() {
  location.reload();
}
