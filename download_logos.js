const fs = require('fs');
const https = require('https');
const path = require('path');

const logos = [
  {
    name: 'Ethereum_Logo.svg',
    url: 'https://raw.githubusercontent.com/devicons/devicon/master/icons/ethereum/ethereum-original.svg'
  },
  {
    name: 'Solidity_Logo.svg',
    url: 'https://raw.githubusercontent.com/devicons/devicon/master/icons/solidity/solidity-original.svg'
  },
  {
    name: 'React_Logo.svg',
    url: 'https://raw.githubusercontent.com/devicons/devicon/master/icons/react/react-original.svg'
  },
  {
    name: 'Web3js_Logo.svg',
    url: 'https://raw.githubusercontent.com/devicons/devicon/master/icons/web3js/web3js-original.svg'
  },
  {
    name: 'OpenZeppelin_Logo.svg',
    url: 'https://raw.githubusercontent.com/simple-icons/simple-icons/develop/icons/openzeppelin.svg',
    postProcess: (svg) => {
      // Add fill color to OpenZeppelin monochrome SVG
      return svg.replace('<path ', '<path fill="#4E5EE4" ');
    }
  },
  {
    name: 'Nodejs_Logo.svg',
    url: 'https://raw.githubusercontent.com/devicons/devicon/master/icons/nodejs/nodejs-original.svg'
  },
  {
    name: 'Polygon_Logo.svg',
    url: 'https://raw.githubusercontent.com/devicons/devicon/master/icons/polygon/polygon-original.svg'
  },
  {
    name: 'Hardhat_Logo.svg',
    url: 'https://raw.githubusercontent.com/devicons/devicon/master/icons/hardhat/hardhat-original.svg'
  }
];

const destDir = path.join(__dirname, 'images', 'Logos');

function download(logo) {
  return new Promise((resolve, reject) => {
    https.get(logo.url, (res) => {
      if (res.statusCode !== 200) {
        reject(new Error(`Failed to download ${logo.name}: Status Code ${res.statusCode}`));
        return;
      }
      let data = '';
      res.on('data', (chunk) => { data += chunk; });
      res.on('end', () => {
        if (logo.postProcess) {
          data = logo.postProcess(data);
        }
        fs.writeFileSync(path.join(destDir, logo.name), data);
        console.log(`Successfully downloaded ${logo.name}`);
        resolve();
      });
    }).on('error', (err) => {
      reject(err);
    });
  });
}

async function run() {
  for (const logo of logos) {
    try {
      await download(logo);
    } catch (e) {
      console.error(e.message);
    }
  }
}

run();
