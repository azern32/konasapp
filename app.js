const { Console } = require('console');
var http = require('http');
var dns = require('dns');
var url = require('url');
var fs = require('fs');

http.createServer((req, res)=>{
  let q = url.parse(req.url, true)
  let filename = '.'+ q.pathname

  fs.readFile(filename, (err,data)=>{
    if(err){
      res.writeHead(404, {'Content-Type':'text/html'})
      return res.end('404 ki puang')
    }
    res.writeHead(200, {'Content-Type':'text/html'})
    res.write(data)
    return res.end()
  })
}).listen(8080)


// console.log(process);
var w3 = dns.lookup('w3schools.com', function (err, addresses, family) {
    console.log(addresses);

  });

console.log(dns.getServers())
