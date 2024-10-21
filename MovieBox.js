import Knex from "knex";
import dayjs from 'dayjs';
import { input, select } from '@inquirer/prompts';


const db = Knex({
    client: 'sqlite3',
    connection: {
        filename: './database/database.sqlite'
    },
    useNullAsDefault: true
});

let date = null;
let movie = null;
const type = await input({ default:  'date', message: 'Would you like to search for a date or movie? [date/movie]' });
if (type === 'date') {
    date = await input({ default:  dayjs().format('MM/DD/YYYY'), message: 'Provide a mm/dd/yyyy you want to see sales for' });
} else {
    const movies = await db('movies').select('*');
    movie = await select({
        message: 'Select movie',
        choices: movies.map(m => ({
            name: m.title,
            value: m.id,
            description: m.synopsis,
        }))
    });
}

const sales =  await db('sales').join('showtimes', 'showtimes.id', 'sales.showtime_id')
    .join('theatres', 'theatres.id', 'showtimes.theatre_id')
    .select({theatre: 'theatres.name'})
    .sum({ revenue: 'sales.cost' })
    .sum({ people: 'sales.chairs' })
    .modify(queryBuilder => {
        if (date !== null) {
            const sql_date = dayjs(date, 'MM/DD/YYYY').format('YYYY-MM-DD');
            queryBuilder.whereRaw('Date(sales.created_at) = ?', [sql_date]);
        }
        if (movie !== null) {
            queryBuilder.where('showtimes.movie_id', movie);
        }
    })
    .groupBy('showtimes.theatre_id')
    .orderBy('revenue', "desc")

console.log({ sales });
process.exit();
