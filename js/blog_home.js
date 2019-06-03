load_sketches((res) => {

  for (var item of res) {

    let el = document.createElement('div')
    el.className = 'sketch_item'

    let name = document.createElement('span')
    name.innerText = item.name
    el.appendChild(name)

    let frame = document.createElement('iframe')
    frame.setAttribute('data-src', item.url)
    el.appendChild(frame)

    el.onclick = () => {
      close_all_items()
      el.classList.toggle('sketch_item_open')
      frame.setAttribute('src', frame.getAttribute('data-src'))
    }

    document.querySelector('#sketches_list').appendChild(el)

  }

})

function load_sketches(callback) {
  const req = new XMLHttpRequest();
  req.onreadystatechange = function(event) {
    if (this.readyState === XMLHttpRequest.DONE) {
      if (this.status === 200) {
        callback(parse_github(this.responseText))
      } else {
        callback('')
      }
    }
  }
  req.open('GET', 'https://raw.githubusercontent.com/t0mm4rx/sketches/master/ReadMe.md', true)
  req.send(null)
}

function parse_github(str) {
  res = []
  arr = str.split('*')
  arr.shift()

  for (var a of arr) {
    let name = a.split(']')[0].split('[')[1]
    let url = a.split('(')[1].split(')')[0]
    res.push({
      name: name,
      url: url
    })
  }

  return res
}

function close_all_items() {
  for (var item of document.querySelectorAll('.sketch_item')) {
    item.classList.remove('sketch_item_open')
    item.querySelector('iframe').removeAttribute('src')
  }
}
