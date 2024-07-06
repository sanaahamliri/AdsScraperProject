import puppeteer from 'puppeteer';

(async () => {
    try {
        const browser = await puppeteer.launch();
        const page = await browser.newPage();
        await page.goto('https://amsterdam.mijndak.nl/Woningaanbod', { waitUntil: 'networkidle2', timeout: 0 });


        await page.waitForSelector('.advertentiecontainer');

        const result = await page.evaluate(async () => {
            const adElements = document.querySelectorAll('.advertentiecontainer');
            const hrefs = Array.from(adElements, ad => ad.parentElement.href);
            let adsList = [];
            let logs = [];

            adElements.forEach((ad, index) => {
                const imageUrl = ad.querySelector('.fotocontainer img')?.src || 'No Image';
                const title = ad.querySelector('.break-word.font-size-h5 span')?.innerText || 'No Title';
                const price = ad.querySelector('.font-semi-bold span')?.innerText || 'No Price';
                const location = ad.querySelector('.text-grey-lighter span')?.innerText || 'No Location';
                let size = 'No Size';
                let rooms = 'No Rooms';
                let type = 'No Type';
                let endDate = 'No Date';
                let description = 'No descreption';

                let conditions = 'No conditions';
                let features = 'No features';
                let rules= 'No rules';
                let prices = 'No prices';
                const line = ad.querySelector('.text-grey-lighter.vertical-align.flexwrap')?.innerText;
                if (line) {
                    const roomsMatch = line.match(/(\d+)\s*Kamer[s]?/);
                    const sizeMatch = line.match(/(\d+)\s*m²/);
                    rooms = roomsMatch ? roomsMatch[1] : 'No Rooms';
                    size = sizeMatch ? sizeMatch[1] : 'No Size';
                    type = line.split('²')[1] ? line.split('²')[1].trim() : 'No Type';
                    if (title === 'Smaragdstraat 31') {
                        logs.push(line + '/' + type);
                    }
                }

                const endDateElm = ad.querySelector('.text-grey.text-align-right.font-size-s');
                if (endDateElm) {
                    const dateMatch = endDateElm.innerText.match(/(\d{2}-\d{2}-\d{4})/);
                    endDate = dateMatch ? dateMatch[1] : 'No Date';
                }

                adsList.push({
                    href: hrefs[index],
                    imageUrl,
                    title,
                    price,
                    location,
                    rooms,
                    size,
                    type,
                    description,
                    conditions,
                    features,
                    prices,
                    rules,
                    endDate,
                    images: [],
                });
            });

            return { adsList, logs };
        });

        // Process each ad asynchronously to fetch description/features/rules/prices/images
        await Promise.all(result.adsList.map(async (ad, index) => {
            const pageNew = await browser.newPage();
            await pageNew.goto(ad.href, { waitUntil: 'networkidle2', timeout: 0 });
            await pageNew.waitForSelector('.main-content.ThemeGrid_Container');


            const resultAdsDetails = await pageNew.evaluate(() => {
                const descriptionElement = document.querySelector('.OmschrijvingWidget');
                const description = descriptionElement ? descriptionElement.innerText.trim() : 'No Description';

                const conditionsElement = document.querySelector('.VoorwaardenWidget');
                const conditions = conditionsElement ? conditionsElement.innerText.trim() : 'No conditions';

                const featuresElement = document.querySelector('.KenmerkenWidget');
                const features = featuresElement ? featuresElement.innerText.trim() : 'No features';

                const pricesElement = document.querySelector('.PrijsWidget');
                const prices = pricesElement ? pricesElement.innerText.trim() : 'No prices';

                const rulesElement = document.querySelector('.SpelregelsWidget');
                const rules = rulesElement ? rulesElement.innerText.trim() : 'No rules';

                const imagesElements = document.querySelectorAll('.lightbox-content-thumbnail');
                const images = Array.from(imagesElements).map(img => img.src);
              
                return { description, conditions,features, prices, rules, images };
            });
            await pageNew.close();
            result.adsList[index].description = resultAdsDetails.description;
            result.adsList[index].conditions = resultAdsDetails.conditions;
            result.adsList[index].features = resultAdsDetails.features;
            result.adsList[index].prices = resultAdsDetails.prices;
            result.adsList[index].rules = resultAdsDetails.rules;
            result.adsList[index].images = resultAdsDetails.images;


        }));


        console.log(JSON.stringify(result.adsList, null, 2));
        await browser.close();
    } catch (error) {
        console.error('Error:', error);
    }
})();