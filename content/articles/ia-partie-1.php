<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>
<h3>Introduction</h3>
<p>L'intelligence artificielle est un sujet en vogue. Une des branches les plus populaire de l'IA, les réseaux de neurones, sont présentés comme un <b>outil puissant</b> permettant de résoudre des problèmes jusqu'alors réservés au cerveau humain. Nous verrons ici leur cas d'utilisation et leur fonctionnement.
Cette première partie est centrée sur le <b>fonctionnement d'un seul neurone</b>, qui constitue la base d'un réseau de neurone. Un neurone seul peut, nous le verrons, résoudre des problèmes simples. Après les explications théoriques je vous montrerai comment implémenter un neurone en Javascript, et nous résoudrons un premier problème grâce au <b>machine learning</b>.
Cet article se veut destiné aux débutants, certains détails seront simplifiés afin de rendre les explications les plus claires possibles.</p>
<h3>À quoi sert un réseau de neurone ?</h3>
<p>Un réseau de neurone à un but précis : <b>prédire un résultat à partir de valeurs données</b>. Voici une liste d'exemple :
<ul>
  <li>Prédire un résultat sportif à partir de facteurs comme la forme des joueurs, le classement des équipes</li>
  <li>Décider les actions à exercer pour conduire une voiture autonome grâce aux données des capteurs retranscrivants l'environment</li>
  <li>Déterminer si un mail est un spam en se basant sur des paramètres comme la forme de l'adresse d'envoi, la longueur du mail, la présence de certains mot-clés</li>
  <li>Détecter une maladie en se basant sur des critères comme l'activité de la personne, son alimentation</li>
</ul>
Dans touts ces cas, le réseau prend en entrée des données, et nous sort une nouvelle valeure.
</p>

<p>Mais comment le réseau peut-il "deviner" la valeur attendue ? C'est là qu'intervient le <b>machine learning</b>. Il faut entrainer le réseau avec des milliers voir des millions de cas déjà résolus.<br />
Reprenons l'exemple du spam : votre messagerie doit détecter si un mail reçu est un spam ou non. Il va constituer une base de données de mails spam signalés par les utilisateurs. Grâce à cette base de mails spam il peut entrainer son réseau de neurone à détecter de nouveaux cas inconnus. Un réseau de neurones crée une règle générale à partir de données existantes afin de pouvoir appliquer cette règle à de nouveaux cas.</p>

<h3>Comment fonctionne un neurone ?</h3>
<p>Nous rentrons maintenant dans la partie technique. Un neurone virtuel est une imitation très simplifiée d'un neurone biologique. Ce neurone prend en entrée une liste de valeurs. Il fait un cacul que nous détaillerons plus tard et retourne une valeur de sortie.<br />
À chaque entrée correspond un <b>poids</b>. Le poids est un coefficient qui indique quelle est <b>l'importance d'une entrée sur le résultat</b>. Quelle valeur ces poids prennent t-ils ? Ils sont calculés grâce à l'entrainement du neurone. La seule fonction de l'entrainement est de trouver des poids qui donnent le résultat le plus correcte possible.
Imaginez une boite avec des potars qui correspondent au poids. Le machine learning c'est tourner ces boutons dans touts les sens pour trouver une configuration qui donne le résultat le plus satisfaisant possible.<br/>
Prenons un exemple : notre neurone a pour but de prédire si un patient est malade ou non. Il renvoi 1 si le patient est malade, 0 si il est sain. Ses entrées sont :
<ul>
  <li>Le patient fait-il du sport ?</li>
  <li>Le patient fume t-il ?</li>
  <li>Le patient possède t-il une trotinette ?</li>
</ul></p>
<p>
Toutes ces entrées sont binaires, soit 1, soit 0. On entraine le neurone avec une base de données de milliers de patients malades et sains, pour lesquels <b>on connaît les entrées et la sortie</b>. On peut anticiper les valeurs que les poids vont prendre après l'entrainement :
<ul>
  <li>La première entrée va avoir un poids négatif et important, car elle influence de manière négative le fait d'être malade.</li>
  <li>La deuxème entrée va avoir un poids positif, car elle influence de manière positive le fait d'être malade.</li>
  <li>La troisième entrée va avoir un poids très proche de zéro, car le fait de posséder une trotinette ne semble pas être corrélé avec le fait d'être malade. Cette entrée a donc une influence nulle sur le résultat.</li>
</ul>
</p>
<div class="full_width">
  <img src="<?php echo $GLOBALS['url']; ?>content/articles/ia-partie-1/schema1.jpg" alt="Schéma du fonctionement d'un neurone"/>
</div>
<p>Voyons maintenant comment en connaissant les poids et les entrées, le neurone calcule une sortie. C'est relativement simple, cela ce fait en deux étapes :
<ul>
  <li>Tout d'abord on fait la somme des entrées multipliées par leur poids respectif. On note X les entrées et W les poids.
    <br />
    `S = sum(Wi * X i)`
    <br />
    On ajoute ensuite le bias, une nouvelle entrée dont vous comprendrez l'utilitée lors de la mise en pratique plus bas. C'est une valeur qui a le même rôle qu'une entrée classique, elle nous permettera de résoudre certains problèmes.
    <br />
    `S = sum(Wi * X i) + \beta`
  </li>
  <li>On passe ensuite cette somme dans une <b>fonction d'activation</b>. C'est simplement une fonction qui va normaliser notre somme entre 0 et 1. Une des fonctions les plus utilisées est la fonction sigmoïd :
  <br />
  `sig(x) = 1 / (1 + e^-x)`
  <br />
  Cette fonction ressemble à ça :
  <div class="full_width">
    <img src="<?php echo $GLOBALS['url']; ?>content/articles/ia-partie-1/sig.jpg" alt="Schéma du fonctionement d'un neurone"/>
  </div>
  On pourra également utiliser la fonction signe quand on voudra une sortie strictement binaire.
  <br />
  `x >= 0 -> 1`
  <br />
  `x < 0 -> 0`
  </li>
</ul>
Résumons toutes les grandeurs composants un neurone :
<ul>
  <li>Une liste d'entrées `X`</li>
  <li>Une liste de poids `W`</li>
  <li>Un bias `\beta`</li>
  <li>Une fonction d'activation, généralement sigmoïd ou signe</li>
</ul>
</p>
