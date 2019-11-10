<?php

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EricMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $menus = [
            [
                'id' => 1,
                'title' => 'Home Solar',
                'url' => 'solar-for-homeowners',
                'content' => [
                    [
                        'title' => 'Secure Affordable Rates For Your Family',
                        'content' => 
'You’ve got energy goals and we want to help you achieve them. This means we offer a wide variety of purchase and lease options to fit your unique solar needs. We believe that making the switch to solar should be easy, not complicated – which means we take care of every aspect of each installation ourselves. No subcontractors.

Has your household income tripled in the last 18 years? Utility rates have sky rocketed in the last 18 years. In 2001, PG&E had 2 tiers, and the most expensive summer time rate was 13.3 cents per kWh. In 2018, that top tier is 40.3 cents for the same E1 rate. That means it’s tripled in 18 years. Solar, on the other hand, has dropped in cost. When we started installing solar in 2004, the average cost $9.00 per kWh. Today it’s less than half that, plus the government will pay a 30% tax credit!

Solar will save you money every month. Many homeowners are shocked at the $20,000 price tag of solar but. what they fail to realize, after a tax credit of $6,000 and financing that remaining $14,000, you’ll save money every month by going solar. Guess what happens when rates increase, you save more money! Going solar means you get to lock in your energy costs and the massive rate hikes stop! 

',
                    ],
                    [
                        'title' => 'Leave a Legacy',
                        'content' => 
'What will you teach your grandchildren? Use all the energy you want, pay as little as you can, and watch out only for yourself? Of course not! Going solar can lower your energy costs today. The average homeowner has a cash system paid for in 7 years. That means, instead of paying the utility for the next 7 years, you recouped your solar investment. Beyond that, installing solar is a clear statement, “I’m not willing to burn fossil fuels, even ‘natural gas’. I want clean renewable energy. I want to leave a better world for the next generation. I believe in doing my part.” What will your legacy be? Go solar, save money, leave a legacy. 

Why did you stop renting and buy a house? Stop renting energy, invest into your future, not the utilities, buy solar. You made a smart choice to buy a house, so why is the thought of adding a system with no moving parts so scary? Your kitchen takes way more abuse, yet you aren’t afraid to own those granite counter tops. There are many ways to get solar. You can buy it straight out, but many finance it! The finance payment is nearly always the same or lower than what you currently are paying.

',
                    ],
                    [
                        'title' => 'Be in Control of Your Own Power',
                        'content' => 
'Remember those brown outs in California? Many of us do. But guess what, solar has completely fixed that! Solar is installed in the smartest, most energy efficient location, right where it’s consumed. Energy plants, are typically hundreds of miles away from where the energy is consumed. Utility companies have shown they only care about their bottom line. We need energy installed right where it’s needed! Going solar helps stabilize our energy grid. Systems being installed today help provide important grid services, such as boosting grid voltage. They are smart devices that help in many more ways than just provide energy. 

',
                    ],
                    [
                        'title' => 'Solar Rebates and Tax Credits',
                        'content' => 
'The federal government currently offers a 30% solar tax credit. It is important to note that as a renewable energy credit, and not a deduction, you will receive the 30% back on your federal taxes (until 2019). Customers who lease solar panel systems cannot outright claim the federal tax credit, but the benefits are passed to them from the system’s owner/installer, lowering their monthly payment substantially.

',
                    ],
                ],
            ],
            [
                'id' => 2,
                'title' => 'Business Solar',
                'url' => 'solar-for-business-owners',
                'content' => [
                    [
                        'title' => 'Lower Your Business Operating Costs',
                        'content' => 'Depending on your business’ unique energy goals, we can provide you with various system options that can greatly reduce or even completely eliminate your current electric bill. Instead of spending too much paying for electricity, you’ll be able to reallocate those funds for more important things. Enjoy a consistent clean power source with very little to no maintenance and an unbeatable warranty.

By adding solar to your professional office space, you can charge more per foot. We’ve successfully seen multiple companies offer Gross Leases or Full Service Leases which increase profits even more. This keeps it simple for the tenant, and you get to charge more. Going solar means you make even more money.

Successful business is about getting others to work towards a goal and producing unstoppable momentum. Why not make the roof work just as hard, by installing solar. Many businesses pay massive electric bills and never even think twice. Every business owner knows that drastically reducing energy is a smart move.

',
                    ],
                    [
                        'title' => 'Become a Recognized Green Leader',
                        'content' => 'Leverage the “green” effect of solar. There is powerful marketing connected with solar. Show your customers you are a leader and care about energy. Show them the products they buy from you are better because of the solar energy decision you made. Going solar of course saves you money, but it can also send a clear message to your customers. We can install a kiosk in your lobby, or on your website, showing everyone how much CO2 you are offsetting or trees you’ve equivalently planted. There are huge marketing forces associated with better energy. Show your customers you are a leader, and they should choose you! 

Set yourself apart from your competition. Your competitive advantage should start with not wasting energy. You wouldn’t want your employees taking advantage of you by wasting time. Why let the utility take advantage of you, and sell you power at a higher cost than needed? Energy is the most basic commodity that exists. Selling an electron doesn’t get any more basic. So why the utility upsell you, when you can lower your costs and still be connected to the grid. Employees love to know they work for a company that has solar. It makes them feel proud of where they work. Empower your employees with the knowledge their company has solar.  

By making the financially wise decision to go solar, your business will also gain the reputation of making environmentally-conscious decisions, encouraging a positive image to your employees and customers. Let’s keep our environment clean and green for future generations to enjoy.

',
                    ],
                    [
                        'title' => 'Solar Rebates and Tax Credits',
                        'content' => 'The federal government currently offers a 30% solar tax credit. It is important to note that as a renewable energy credit, and not a deduction, you will receive the 30% back on your federal taxes (until 2019). Additionally, commercial customers can take a 5-year accelerated tax depreciation on their system cost. Customers who lease solar panel systems cannot outright claim the federal tax credit, but the benefits are passed to them from the system’s owner/installer, lowering their monthly payment substantially.

The average business solar system is paid for in 4.3 years. Business is hard enough, isn’t it time you gave yourself a raise by going solar? The Tax Reform Bill now allows business to 100% depreciate solar in the first year. Plus, you get a 30% tax credit. The government is paying you to go solar. What are you waiting for? 

',
                    ],
                ],
            ],
            [
                'id' => 3,
                'title' => 'Services',
                'url' => 'solar-panel-installation',
                'children' => [
                    [
                        'id' => 4,
                        'title' => 'Solar Panel Installation',
                        'url' => 'solar-panel-installation',
                        'content' => [
                            [
                                'title' => 'Solar Panel Installation',
                                'content' => 'For most customers, residential or commercial, the roof is the best location for solar panel installation. It usually already has the structural specifications that the solar panels require. All that is needed is mounting hardware and appropriate flashings. If the roof is not applicable or desired, various other mounting options are available, including shade awnings or ground-mount options (i.e., standard ground-mount, ground pole, or trackers).

',
                            ],
                            [
                                'title' => 'What Are PV Panels?',
                                'content' => 'Photovoltaic, or PV for short, is a technology that converts light directly into electricity. PV is a developing field and utilizes several different technologies: monocrystalline (single crystal), polycrystalline (multiple crystal), cadmium telluride, gallium arsenide, or amorphous silicon deposited as a thin film. The major advantage of monocrystalline cells is their higher efficiency and therefore smaller space requirements. Thin film can be cheaper to manufacture but is significantly less efficient, requiring more area which results in more labor, mounting hardware, and bottom-line costs.

PV solar panels are usually either roof-mounted or ground-mounted. On a rooftop, rows of panels (called arrays) are mounted to face south or southwest at or near a 30 degree angle for maximum efficiency. The PV solar panels are fastened onto aluminum racks which are then secured to the roof framing, providing sufficient support for the array. This same array layout can also be mounted on the ground if the property has large, usable ground space.

Pole mounts are also a popular system, especially in more rural areas. The panels are generally mounted on the top of the pole but can also be mounted onto the side. Top-pole mounts require a steel pole about 12 feet in length set in concrete. These systems may include an auto-tracking feature which will automatically adjust the angle of the panels to follow the sun’s progress throughout the day.

',
                            ],
                            [
                                'title' => 'System Components',
                                'content' => 'Synergy Power’s solar power systems consist of an array of solar panels (or modules), a mounting system, and an inverter with a computerized solid-state controller. The solar panels generate DC electricity directly from sunlight. The inverter converts the DC electricity produced by the solar panels into AC electricity to be usable in the home. The computerized controller also regulates the solar power system and ensures peak performance. A standard system is designed to stop working the moment there is a power interruption. In applications that are not connected to the grid or require back-up power, batteries are also required.

',
                            ],
                            [
                                'title' => 'Inverter Installation',
                                'content' => 'The inverter is commonly installed near the main panel either indoors or outside. Since it is made with solid-state electronics and performs better in cooler conditions, the inverter should be located out of afternoon sun. Usually, the best location is near the main electric panel.

',
                            ],
                            [
                                'title' => 'System Monitoring',
                                'content' => 'This allows you to remotely view your system’s performance through your computer or remotely on a wireless device.

',
                            ],
                            [
                                'title' => 'Additional Hardware',
                                'content' => 'If you decide you want a battery back-up system or need a stand-alone energy solution, Synergy Power can design and install a system that is right for you. Some back-up systems and all stand-alone systems require a gas generator (propane, natural gas, diesel, etc.). Battery banks vary in size depending on power loads but generally need 10-20 sq. ft. and may require venting. Learn more about add-ons here.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 5,
                        'title' => 'Repairs & Add-Ons',
                        'url' => 'panel-repairs-add-ons',
                        'content' => [
                            [
                                'title' => 'The Dangers of Ignoring Issues',
                                'content' => 'When solar is installed wrong, there are serious, potentially life threatening disasters in plain sight. Take for example a problem we have found all too often.

The installer was in a rush and didn’t fully terminate the wiring. Older systems, which do not have Arc fault detection, just keep on operating. Eventually, that poorly terminated wire will start to generate heat. This heat has melted down connectors, burned wiring boxes down, and even the back side of modules. There are documented cases of these types of issues burning down buildings.

Other issues range from improperly electrically grounded systems, to modules flying off the roof. We have unfortunately been called out to multiple sites, where the previous installation company was clearly in a rush and didn’t properly secure the modules. Typically a solar module is mounted to your home or business, so that it can sustain hurricane force winds.  

So what are you to do? A thorough system inspection, by a NABCEP certified professional can often help avoid many of these issues. We check everything out, so you can sleep soundly, knowing you and your family is safe. ',
                            ],
                            [
                                'title' => 'Additional Hardware',
                                'content' => 'If you decide you want a battery back-up system or need a stand-alone energy solution, Synergy Power can design and install a system that is right for you. Some back-up systems and all stand-alone systems require a gas generator (propane, natural gas, diesel, etc.). Battery banks vary in size depending on power loads but generally need 10-20 sq. ft. and may require venting.

So how does more adding solar panels to an existing system work?

This all depends on how big your inverter is. If your system was oversized to accommodate adding to it, your inverter should be big enough to handle generating a little more power. If your inverter is too small to handle additional panels, you’ll need to have a larger capacity inverter installed along with the new panels.

Also, be space-conscious. More panels means you’ll need more available space, either on your roof or on the ground.

A couple of things to keep in mind…

The first thing you should do when considering adding to your system is to contact the solar contractor that installed your solar panels originally and discuss with them upgrade options and what your goals are. This is an important step to remember since you can possibly void your system warranty if you hire another contractor to add to your existing system. If the original solar contractor is no longer in business, you should try contacting the manufacturer of your system and ask them to refer a local installer who can help you.

Mixing and matching components from different brands can be done if needed, as long as the voltage is compatible and can be balanced properly.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 6,
                        'title' => 'Maintenance Service',
                        'url' => 'solar-panel-maintenance',
                        'content' => [
                            [
                                'title' => 'Keep Your System Clean',
                                'content' => 'If your solar panels aren’t in a hard to reach place, you can keep your panels clean most of the year all by yourself, though we highly recommend having your solar company inspect and maintain your panels once or twice a year. Keeping your solar panels clean is as easy as cleaning the dishes, just add soap and water. Right after washing them, customers often see a 10% increase in production so you will absolutely benefit from regular cleanings.

What to do? Well cleaned and maintained items always last longer. Soap and water or a vinegar solution works just fine for your average debris and dirt covered panel, maybe using rubbing alcohol for any particularly tough spots. But be warned, sometimes certain soaps leave a solar panel clean but too shiny, which reflects the sunlight instead of absorbing it! If you want to save the time and energy, then call Synergy Power and have us do it for you!

',
                            ],
                            [
                                'title' => 'Does Your Solar Need Service?',
                                'content' => 'We get calls when people get a large utility bill or otherwise have concerns about the company that installed. Naturally they want to verify that their system is working correctly. How can you know how your system is performing before something bad happens? 

– Is your system on track monthly?

A good install company should explain & provide monitoring of your system’s performance on a monthly basis. A glance at a smart phone app once a month tells you all you need to know. Many customers want to see the instant output of a PV system to determine system performance, but this is unrealistic. Such data requires specialized equipment, which few install companies have. SynergyPower has this apparatus- We can conduct such a test on a clear day at a time when your panels have full sun (no shade).

– Is your monitoring reporting any errors?

Nearly all PV solar systems today have free monitoring systems. The easiest way to access many of these is to install the app on your smart phone and keep a weekly to monthly eye on it. If it reports an error, contact the installer. Or call us! We can help resolve the issue. 

– Have trees shaded your solar since you installed?

Tree growth is often overlooked as culprit for your solar underperforming over time. Installers may assume trees will not grow and/or you’ll keep them trimmed. There are even laws in some states ensuring your ‘right to sun access’ once you install solar on your roof, including from neighbors’ trees. Regardless of views on that legislation, it is a factor that’s often overlooked. Few people want to pay for a system inspection only to find out they need to pay someone else to trim their trees in order to restore system performance. 

– How does your monthly utility bill look?

If you are on an annual net metering agreement (NEM) with your utility, expect to create a credit in the summer and likely the opposite in the winter. This assumes your system is designed to eliminate your bill and not just reduce it. Keeping an eye on that monthly utility statement is a great way to make sure you don’t get hit with a massive bill at the end of the solar anniversary.  

– Is the inverter on?

Many systems have an inverter with a green light indicating that all is well. Check your manual or send us a picture of yours if you have any questions. Of course, many other systems have AC modules or inverters under each panel, a good reason to keep that monitoring active and supervised. 

– Are the panels dirty?

While some dirt is normal, if your solar panels are very dirty (or these days, covered with ash), it may be practical to clean them. Our trained technicians clean the panels and perform a basic check to ensure the system is working. They can also recommend a more thorough inspection and explain why it may be warranted. Avoid window cleaners that dismiss the difference between solar panels and window glass, as they may use soap that can leave residue that reflects, rather than absorbs sunlight. SynergyPower has solar panel cleaing experts on staff.

',
                            ],
                            [
                                'title' => 'What Does Service Cost?',
                                'content' => 'Residential service starts at $375 for a NABCEP certified installer to inspect your system. Larger systems, with more than 2 string inverters typically cost an additional $50 per inverter.  

Commercial system inspections start at $475 and go up from there based on size and location. 

A few things to keep in mind regarding system inspections. 

– What exactly is being checked?

You want to make sure you know what exactly is being verified, and what type of documentation you’ll receive. Synergy Power provides a 28 point check list with photo documentation. 

– What testing standards will be used?

We test to the MCS and IEC 642446 standards. This means your system will be tested to ensure safe and proper operation. You can learn more about these standards here.

Costs can increase due to accessibility. If your system is mounted on a carport, that can often increase the complexity and time required for proper testing. Expect to pay more for difficult access situations. 

If you are getting your system inspected, it’s also a good time to consider getting it cleaned. Since you’ll have technicians on site, it’s a great time to save a truck roll and get those modules cleaned. 
',
                            ],
                        ],
                    ],
                    [
                        'id' => 7, 
                        'title' => 'Referral Program',
                        'url' => 'referral-program',
                        'content' => [
                            [
                                'title' => 'DO YOU KNOW SOMEONE WHO IS INTERESTED IN GOING SOLAR? 

',
                                'content' => 'PROVIDE CONTACT INFO AND RECEIVE $400 WHEN THEY GO SOLAR WITH SYNERGY POWER!',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'id' => 8,
                'title' => 'Benefits of Solar',
                'url' => 'the-benefits-of-solar-power',
                'children' => [
                    [
                        'id' => 9, 
                        'title' => 'Benefits of Solar',
                        'url' => 'the-benefits-of-solar-power',
                        'content' => [
                            [
                                'title' => 'Help The Planet',
                                'content' => 'When fossil fuels are burned for power, toxic gases are released into the air. Those toxic gases build up as pollution (yuk!) and contribute to climate changes such as global warming. Also, some fuels such as coal and oil require mining, drilling, and fracking, which can leave the land stripped of plants and trees along with a whole other list of major issues that are harmful.

On the other hand, the sun is a natural power source and solar panels are able to easily capture clean sunlight that can be turned into useable power. No burning or toxic gases needed! The more people switch their homes and businesses to run on solar power, the less fossil fuels are needed. Which is good since eventually the supply will run out, whereas solar and other renewable sources will be there when we need them.

',
                            ],
                            [
                                'title' => 'The Benefits of Solar Power',
                                'content' => 'Save money by reducing or eliminating your electric bill
Generate your own pollution-free, clean electricity
Invest money into your home, not your utility company
Fix your electricity cost over the next 40 years
Enjoy a 25-year warranty on solar panels and a 40-year design-life
Hedge against future utility rate increases
No batteries needed; bank your extra energy in the local utility-grid (net-metering)
Solar energy requires very little maintenance
No lifestyle changes; use solar power the same as you currently use electricity
',
                            ],
                            [
                                'title' => 'Solar Power IS Affordable',
                                'content' => 'By reducing or eliminating a bill you already pay, finding money for solar is easy. Many of our customers choose to finance a system. The new solar loan payment is fixed, unlike rising utility rates (PG&E’s rates have been rising 6.5% each year for the past 25 years), and is usually cheaper than what you were paying to the utility company. This means you can save money. More than 90% of our customers have a positive day-one cash flow. You can’t afford not to go solar!

',
                            ],
                            [
                                'title' => 'Switching to Solar Is Easy',
                                'content' => 'Synergy Power is a turn-key solution. That means we take care of everything and it’s all done in-house, so we can guarantee your satisfaction. If you have any questions about switching to solar, contact us. Our highly-trained consultants are available to speak with you and discuss the best solution for your home.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 10, 
                        'title' => 'Rebates & Tax Credits',
                        'url' => 'solar-rebates-tax-credits',
                        'content' => [
                            [
                                'title' => 'Solar Tax Credits',
                                'content' => 'The federal government currently offers a 30% solar tax credit. It is important to note that as a renewable energy credit, and not a deduction, you will receive the 30% back on your federal taxes (until 2019).  Additionally, commercial customers can take a 5-year accelerated tax depreciation on their system cost.

Customers who lease solar panel systems cannot outright claim the federal tax credit, but the benefits are passed to them from the system’s owner/installer, lowering their monthly payment substantially.

',
                            ],
                            [
                                'title' => 'Solar Rebates & Renewable Energy Credits',
                                'content' => 'Although the state of California does not offer rebates or tax credits, there are many local cities and counties that offer homeowners in their communities solar rebates or renewable energy credits. To find out what programs are offered in your area, see the DSIRE website.

For Northern California residential and commercial customers, your utility company will issue energy credits for excess power your system produces through their net-metering program.

',
                            ],
                            [
                                'title' => 'IRS Form 5695 for Residential Energy Credits 2017',
                                'content' => 'The IRS Form 5695 for Residential Energy Credits 2017 is the current form available for those who are looking to claim energy credits on their 2017 taxes. You are eligible to apply for this credit if you purchased and installed a solar power system during 2017.

Click the image below to view and download the form.

',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'id' => 11,
                'title' => 'Case Studies',
                'url' => 'livermore-home-case-study-2',
                'children' => [
                    [
                        'id' => 12, 
                        'title' => 'Livermore Home',
                        'url' => 'livermore-home-case-study-2',
                        'content' => [
                            [
                                'title' => 'Solar Panel Installation',
                                'content' => '',
                            ],
                        ],
                    ],
                    [
                        'id' => 13, 
                        'title' => 'Fremont Cadillac',
                        'url' => 'fremont-cadillac-case-study',
                        'content' => [
                            [
                                'title' => 'Solar Panel Installation',
                                'content' => '',
                            ],
                        ],
                    ],
                    [
                        'id' => 14, 
                        'title' => 'Chevy Dublin',
                        'url' => 'chevy-dublin-case-study',
                        'content' => [
                            [
                                'title' => 'Solar Panel Installation',
                                'content' => '',
                            ],
                        ],
                    ],
                    [
                        'id' => 15, 
                        'title' => 'ARCO',
                        'url' => 'arco-case-study-2',
                        'content' => [
                            [
                                'title' => 'Solar Panel Installation',
                                'content' => '',
                            ],
                        ],
                    ],
                    [
                        'id' => 16, 
                        'title' => 'United Duralume Products',
                        'url' => 'united-duralume-products-case-study',
                        'content' => [
                            [
                                'title' => 'Solar Panel Installation',
                                'content' => '',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'id' => 17,
                'title' => 'Areas Served',
                'url' => 'concord-ca-solar-energy-systems',
                'children' => [
                    [
                        'id' => 18, 
                        'title' => 'Concord',
                        'url' => 'concord-ca-solar-energy-systems',
                        'content' => [
                            [
                                'title' => 'Solar Panel Systems for Concord, CA',
                                'content' => 'Did you know that electricity consumption by residents of California averages 573kWh per month? Installing PV solar panels for homes saves residents of Concord, and other California cities, a lot of money in energy costs.

Couple that with local, state, and federal tax incentives, and PG&E’s net metering programs, and you have several great reasons for going solar now!

',
                            ],
                            [
                                'title' => 'PG&E’s Net Metering Program',
                                'content' => 'A huge incentive for Concord residents to install a solar panel roof is that residential home owners and business owners receive 1-for-1 credit for each kWh exported to the grid. Under the new NeM-2 rules, net metering requires new solar customers to switch to time-of-use billing, making solar a great investment that takes advantage of a combination of outstanding solar production, not to mention the fact that solar systems are becoming more and more affordable.

Couple net metering advantages with the federal solar tax credit that allows 30% of the whole photovoltaicsystem cost to be claimed as a tax credit, not a deduction, until it is used up. Any size solar system is eligible for this incentive as of 2018, but with politicians and utility companies constantly fighting incentives, and the tax credit set to drop to 20% starting in January 2020, now is the time to take advantage of what is currently offered.

',
                            ],
                            [
                                'title' => 'A Turnkey Solar Panel System',
                                'content' => 'At Synergy Power, we customize a solar photovoltaic systemsolution that addresses your wants and desires.  After we sit down with you, and understand what your needs are, we design a solar system that addresses those needs. We then install the solar energy system and ensure that it works according to your specifications and energy goals. We believe that making the switch to solar should be easy and straightforward.  That’s why we take care of every aspect of your installation ourselves. We guarantee our work and warranty the products we use.

First, we determine whether or not your house or business is suitable for solar installation. Once we determine that, we figure out how many solar panels or solar roof tiles that you will need to cover your power bill. From there, we determine how much a suitable solar system will cost before and after-tax incentives.

If you are eligible for a zero down solar system installation deal, we will help you obtain that financing as well. We also show you your likely payback period, break-even point, and when you can expect a return on your investment.

Solar systems typically add a minimum of $15,000.00 to the value of your home, which we encourage you to verify with your realtor. Additionally, a study conducted by researchers from the U.S. Department of Energy’s Lawrence Berkeley National Laboratory, shows that homes with solar systems actually sell faster than homes without a solar photovoltaic system.

',
                            ],
                            [
                                'title' => 'What to Expect from Solar Panel Installation in Concord',
                                'content' => 'Ask yourself this, has my household income tripled over the last 18 years? What about your utility rates?

We cannot speak to your income, but we do know that since 2001, PG&E has increased their rates significantly. In 2001, there were two rate tiers with the most expensive one being the summer time rate of 13.3 cents per kWh. As of 2018, however, the top tier is 40.3 cents per kWh for the same E1 rate. In contrast, solar rates have dropped significantly since 2004.

The initial price tag for a solar panel system may seem high, but ultimately you save money every month by going solar, and you lock in your energy costs because there are no more energy cost hikes. Most customers can go solar by paying a small deposit and then replacing the monthly payment to the utility company with a cheaper payment to the solar finance company. You literally save money every month by going solar.

',
                            ],
                            [
                                'title' => 'No More Brown Outs with Solar Panels',
                                'content' => 'Most people living in Concord are familiar with brown outs and the discomfort they cause.  Going solar solves that situation. You can eliminate brown outs by installing solar panels in the most energy-efficient location, right where it is consumed, on the roof of your home.

Energy plants are typically miles away from where the energy is consumed, and a plant is a single point of overload and failure. Going solar helps stabilize energy grids by boosting grid voltage while providing your home with secure energy production that is not easily interrupted.

',
                            ],
                            [
                                'title' => 'What Does a Great Solar Site Look Like?',
                                'content' => 'Here are a few specifics about what a great home for solar looks like.

Roof type: Asphalt shingles – tile and rubber membrane do not cost extra, but shake, slate or 100-year-old clay tile may make solar panel installation a bit more expensive.
Roof age:5 to 10 years old is ideal. Once the solar panel installers have placed the solar tiles on top of the roof, they will last a long, long time. Therefore, a solar system installation is often combined with a new roof. We work with a number of roofers, which makes going solar and getting a new roof very easy.
Roof orientation:Due south is great, as is a western orientation, but anywhere between east-southeast and west is satisfactory. We are even seeing panels placed north on a roof. While you may face a slight loss in energy compared to other directions, it’s still better than renting from the utility. We can provide detailed analysis for every roof location.
Roof shade:You are looking for none at all, or very little. Shade kills the output of solar panels if they are traditionally wired, as shade on even a small portion of one panel can reduce output of a whole string of panels.We use micro inverters or optimizers on all our systems to overcome shade challenges. SolarEdge, one of our main product suppliers, is 99% CEC (California Energy Commission) rated efficient. This greatly helps any shading your roof may have. Winter and morning shade is not really as large as a concern as summer shade. Get a detailed analysis of your home solar today.
Concord, California residents and business owners usually have homes and businesses that are perfectly suited to going solar.

',
                            ],
                            [
                                'title' => 'Steps to Installing a Solar Energy System',
                                'content' => 'At Synergy Power, we are one of the solar energy companies that cares about their customers like they are family. We take care of everything from site assessment, to system size and price, to engineering a system that will meet your needs to permits for construction.

We will also help you understand how to set up billing arrangements with your utility company and to determine whether you need to sign up for special rates, or a time-of-use-plan specifically designed to record energy consumed and energy exported.  At Synergy Power, we walk you through the process of going solar every step of the way. If you own a business, not to worry, we also install and maintain solar panels for businesses as well.

Fortunately, California has streamlined the interconnection processes required to get your home solar system assessed and connected quickly, once we have installed the solar panel or roof tile system, and it is ready to turn on. Before this happens, an assessment specialist from your utility company verifies the presence of the necessary hardware and the correct installation of all wiring. Furthermore, once installed, any solar panel repairs that you may need in the future can also be taken care of by Synergy Power

',
                            ],
                            [
                                'title' => 'Concord, California',
                                'content' => 'Synergy Power is proud to service Concord, and help the city become more environmentally conscious. The city of Concord has a long and rich history, dating back to the Miwok people, who hunted and fished in the area as it lies between mountainous regions and the San Francisco Bay. Concord is also home to the Concord Naval Weapons Station, due to its proximity to Port Chicago. The Station helped war efforts from the Vietnam War, through the end of the Gulf War. Today, it is known as Military Ocean Terminal Concord, and the city of Concord is looking to reuse the land, with the help of the Navy. Concord also features the Concord Jazz Festival, that has been running since 1969.

As one of the leading solar panel companies, we are available to answer your questions before, during, and after your system is installed, and we are here to provide any necessary solar panel maintenance required over time. Contact us today to begin the journey towards solar power panels and lower utility bills.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 19, 
                        'title' => 'Livermore',
                        'url' => 'livermore-ca-solar-energy-systems',
                        'content' => [
                            [
                                'title' => 'Solar Panels for Homes and Businesses in Livermore, California',
                                'content' => 'Livermore, California is a great place to live for many reasons, including the fact that it has consistent and strong sunlight totals, making it a great place to “Go Solar!”

Over much of the last decade, California has led the way in the remarkable growth of the US solar market, with PV 16,200 megawatts of installed solar as of October 31, 2017.

As of mid-2017, the average price for solar panels for companies and homes in Livermore was $3.85 per watt, compared to $9.00 in 2004. The typical residential system size in the United States is 5 kilowatts (5,000 watts), making the average cost of a solar energy system in Livermore around $17,300 before any rebates or incentives, which impact the Return on Investment (ROI) over the life of your system.

In fact, the average solar panel system in Livermore cost around $12,000 in 2017, after rebates and before factoring in ROI incentives. This is, in part, due to the 30% rebate offered to both residential and commercial installations. These costs can seem scary, when you don’t compare them to what the utility company is charging. Homeowners are lulled into paying a monthly bill and not realizing they have nothing to show for it. Going solar replaces the utility bill and puts money into your home.

',
                            ],
                            [
                                'title' => 'Going Solar is Easier Then You Think',
                                'content' => 'At Synergy Power, we offer you a turn-key solution. What does this mean? It means that we do it all in-house so that we can guarantee our customers’ satisfaction. We know that you have questions, and we are here to answer them. Our well-trained solar panel installers are always glad to discuss the best solution for your particular home or business.

',
                            ],
                            [
                                'title' => 'How do Photovoltaic Systems Work?',
                                'content' => 'Solar Photovoltaic (PV) devices convert sunlight into electrical energy. A single PV device is known as a cell. It is small, and generally produces about 1 to 2 watts of power.  These cells are connected to form larger units that are then connected to an electrical grid to form a complete PV system. Because solar energy systems are modular, they can be built to meet both large and small electric power needs.

Made of different semiconductor materials, PV cells come in many sizes and shapes ranging from smaller than a postage stamp to several inches in width. To withstand outdoor elements for many years, these cells are sandwiched between protective materials.

PV modules and arrays a part of a larger system that includes mounting structures and components that convert direct current (DC) electricity to alternating current (AC) current, powering the electrical needs of your home or business.

As a turnkey designer and installer of PV solar roof panels, Synergy Power ensures that all your solar system needs are taken care of for your solar panel roof installation, solar panel maintenance, and solar panel repair.

',
                            ],
                            [
                                'title' => 'Benefits of Solar Panel Systems',
                                'content' => 'There are numerous benefits to hiring a solar energy company to power your home. These benefits include:

Financial Savings: Regardless of changing political stances, the fact is that growing global demand for solar power panels has spurred manufacturing and supply chain updates that have seen the cost of solar power drop significantly in many parts of the United States. Another incentive is that solar panel systems add as much as 20% in value to your home. This will increase as conventional electrical rates continue to escalate because solar systems stabilize your utility costs.
Sustainability: Solar energy is generated from the sun and is renewable. In addition, solar energy does not require water to operate, which means it does not have a significant impact on water systems the way that fossil fuels do.
Security: Solar-powered systems are less prone to large-scale failure or blackouts since a disruption of a system in one place does not cut off power to an entire region. In fact, a solar power panels are inherently secure when combined with micro-grids.
Job Creation: According to the Union of Concerned Scientists, “in 2011 the US solar industry employed approximately 100,000 people either full or part time.” This number topped over 300,000 in 2017 with close to 78% of jobs associated with solar panel systems being in installation, sales, and project development while 15% are in manufacturing. This upward trend has been interrupted in 2018 by the imposition of tariffs on solar-related items coming into the United States, but that is seen as temporary.
Peak Power: Usage has been causing brownouts and blackouts in certain parts of the country when power cycles fluctuate, and demand and supply do not match. Traditional solar panels do not have batteries, so any power generated that isn’t used at the home or business is sold back to the utility for purchase later.
At Synergy Power, we offer our customers a turnkey solution that addresses every aspect of going solar. We cover everything including finding the best solar system solution for your home or business, solar panel installation or solar roof tile installation, and the installation and maintenance of your system.

We know that solar systems are an upgrade to your home. According to one study by Lawrence Berkley National Labs, a solar energy system will increase the value of your home by at least $15,000.

Also, each kilowatt hour (kWh) of solar that your home or business generates substantially reduces greenhouse gas emissions like CO2, sulfur oxides, nitrogen oxides, particular matter and other dangerous pollutants while reducing water consumption and costly extraction methods necessitated by oil, gas and fracking solutions.

Just one hour of noon-time summer sun equals the annual United States’ electricity demand.

',
                            ],
                            [
                                'title' => 'Livermore, California',
                                'content' => 'The city of Livermore is home to many different golf courses and vineyards, and a farmer’s market that brings farm-fresh food directly to their customers. But perhaps the most iconic piece of Livermore is the Centennial Light, a lightbulb that has continuously run since 1904 in the Livermore-Pleasanton Fire Department main station. It is amazing that the lightbulb has provided light and energy for so long, and Synergy Power is dedicated to providing that same level of durability to our customers.

California has great solar possibilities available directly from the sun. Synergy Power is one of the solar panel companies that is here to help you harness that resource with solar PV. Contact us today!  We will answer your questions and help you increase the value of your home while lowering your annual electricity bill and energy consumption. Solar energy systems are the future. We will offer you a low-risk, long-term investment in your home, your business, and the planet.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 20, 
                        'title' => 'Lodi',
                        'url' => 'lodi-ca-solar-energy-systems',
                        'content' => [
                            [
                                'title' => 'Lodi, California is Going Solar',
                                'content' => 'Lodi, California is a great place to go green with a solar panel roof for a number of reasons, not the least of which is great exposure to the sun.  Couple that with the cost of converting to a solar energy system dropping across the entire state, and you have the perfect time for putting those solar panels on your roof.

',
                            ],
                            [
                                'title' => 'Savings You Can Expect in 2018',
                                'content' => 'Low prices are always an incentive, but when considering switching your home or business to solar, the long-term return on your investment (ROI) should also be a big consideration. Right now is a great time for Lodi homeowners and businesses to research solar energy companies and look into the average savings of converting from a conventional system to a solar energy system.

',
                            ],
                            [
                                'title' => 'Why is Now the Time for Solar Panels in Lodi?',
                                'content' => 'Solar energy has been and continues to be a political football that gets tossed around according to various state and federal political agendas. Right now, both state and federal incentives are in place to reduce the cost of a solar photovoltaic system to the most affordable levels ever for Lodi residents. At Synergy Power, we are committed to not only designing and delivering the best possible solar panels installation for homes, but also for your specific needs and situation. We want to help you take advantage of all incentives available to you. Based on a twenty-year average, the typical Lodi, California homeowner with a 5kW solar energy system can expect to save $51,560.00, while increasing the resale value of their home by a minimum of $15,000.00, using the value of homes sold in Lodi in 2017 that had solar systems.

',
                            ],
                            [
                                'title' => 'Solar System Assessment',
                                'content' => 'We are committed to you being completely happy with your solar energy system. We know that there are a lot of solar panel companies out there, and that your satisfaction is the key to our continued success. That’s why we do the entire job ourselves. We can guarantee the results. We begin our relationship with you by giving you a quote that includes:

A roof assessment that tells us how much roof area is available for PV solar panels and how much sun they will get on an average basis.
A production estimate that estimates how much power the solar panels should produce in kilowatt hours (kWh) per year.
The make and model of equipment being proposed. A solar energy installation consists of panels, racks to attach the panels to your roof, and an inverter to change DC (direct current) power from the panels to AC (alternating current) that runs household appliances. The quote includes the make, model, and number of each component being proposed.
Solar installation costs are quoted in dollars-per-watt with average costs ranging between $3.50 and $4.50 per watt. System costs depend on several factors, including the size of the installation and the condition of your roof. Note that the installation size is measured in kilowatts (kW), which means, for example, that a 5-kW system at $3.80 / watt would have a total cost of $15,000.00
Available incentives – Get solar now before the Federal tax credit(ITC, Investment Tax Credit) is gone.
A payback estimate that uses the production estimate, incentives, and estimated electricity savings to give you a break-even point (4-5 years for businesses and 7 years for homeowners) along with how much you will save over the life of the panels.
',
                            ],
                            [
                                'title' => 'Other Things to Think About with a Solar Panel Installation in Lodi CA',
                                'content' => 
'Synergy power is a licensed California contractor dedicated to delivering turnkey solar energy systems. We use our own solar panel installers who are NABCEP certified and adhere to the highest possible installation procedures. Our solar panels and inverters are high quality with great warranty coverage. We guarantee our work because we want you to be happy with your system. To that end, we are happy to provide you with customer referrals of other solar installations. We work out an installation schedule that works for you and us, so we both know what to expect. Our installation track record ensures that we will be around to honor any warranties, something that it important to Lodi homeowners. We also offer solar panels for companies, if you are looking to go green with your business. Another important consideration for homeowners in the state of California considering solar panel installation is that the State exempts solar installations for property tax. This is great news, as the value of your home can increase thousands of dollars by adding a solar system. In fact, if you decrease your electricity bill by somewhere around $1,000 per year, real-estate agents estimate that you’ve increased the value of your home by between $15,000 and $20,000, which will not be added to your taxable property value base.

',
                            ],
                            [
                                'title' => 'Maintaining Your Solar Panels',
                                'content' => 'At Synergy Power, we recommend that you perform solar panel maintenance for your solar roof tiles every two years. Much like servicing a furnace or cleaning a fireplace, maintaining clean solar panels means maintaining good production from them and your overall system. Many panels are easy to reach and are as easy to wash as your dishes. A little soap and water on a sponge and you’ll keep the system running effectively. Another great solution is a vinegar and water solution. Be sure not to use soap that leaves a solar panel too shiny as that will reflect rather than absorb sunlight. You can also simply call us, and we will be happy to clean the panels for you.  It is up to you, but as any good auto mechanic will attest, a clean, well-maintained system works well and lasts longer. However, if time gets away from you, or some unforeseen circumstance happens, Synergy Power can perform solar panel repairs for you as well.

',
                            ],
                            [
                                'title' => 'The City of Lodi',
                                'content' => 'Made famous by the Creedence Clearwater Revival song “Lodi,” the city of Lodi is a hotspot of activity for the people of San Joaquin County. Not only is Lodi the birthplace of A&W Root Beer, but it is also considered to be the “Zinfandel Capital of the World” for wine enthusiasts. That is probably why one of the most looked forward to events of the year in Lodi is Zinfest, held annually every May since 2005. There is also Wine and Chocolate Weekend held every year since 1997 in February. If you are a lover of food and drink, you can’t do much better than the city of Lodi. Just a few of the many reasons why we are proud to provide solar energy service to this wonderful community.

',
                            ],
                            [
                                'title' => 'Committed to Conservation',
                                'content' => 'At Synergy Power, we know that the decision to go with solar power panels can be daunting, which is why we are committed to helping you not only understand your options but also to pick the best one for you. We are with you every step of the way, from site assessment to turning on your system. Why are we so committed? We believe in solar energy, and satisfied customers, and that the best way forward is with the natural, clean energy provided by the sun.  Get started today! Call us with your questions and concerns and let us help you go solar.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 21, 
                        'title' => 'Manteca',
                        'url' => 'manteca-ca-solar-energy-systems',
                        'content' => [
                            [
                                'title' => 'Manteca, California Solar Panel Systems',
                                'content' => 'Did you know that electricity consumption by residents of California averages 573kWh per month? Installing PV solar panels for homes saves residents of Manteca, and other California towns and cities, a lot of money in energy costs. Couple that with local, state, and federal tax incentives, and PG&E’s net metering programs, and you have several great reasons for going solar now!

',
                            ],
                            [
                                'title' => 'Net Metering for Your Home',
                                'content' => 'A huge incentive for Manteca residents to install a solar panel roof is that residential home owners and business owners receive 1-for-1 credit for each kWh exported to the grid. Under the new NEM-2.0 rules, net metering requires new solar customers to switch to time-of-use billing, making solar panel energy a great investment that takes advantage of a combination of outstanding solar production, not to mention the fact that solar systems are becoming more and more affordable.

Couple net metering advantages with the federal solar tax credit that allows 30% of the whole photovoltaicsystem cost to be claimed as a tax credit until used up, and you have great potential return on investment (ROI). Any size solar energy system is eligible for this incentive as of 2018, but with the ITC dropping this credit to 20% in 2020, now is the time to take advantage of what is currently offered.

',
                            ],
                            [
                                'title' => 'A Manteca Photovoltaic Solar Panel System',
                                'content' => 'At Synergy Power, we customize a solar photovoltaic systemsolution that addresses your wants and desires.  After we sit down with you, and understand what your energy needs are, we design a solar system that addresses those needs. We then install the solar energy system and ensure that it works according to your specifications and energy goals. We believe that making the switch to solar should be easy and straightforward.  That’s why we take care of every aspect of your installation ourselves. We guarantee our work and warranty the products we use.

First, we determine whether or not your house or business is suitable for solar power installation. Once we determine that, we figure out how many solar panels or solar roof tiles that you will need to cover your power bill. Then we determine how much a suitable solar system will cost before and after-tax incentives.

We offer financing to every customer. It only takes 1 – 2 minutes to find out if you qualify and only a few minutes to complete the finance agreement. Soft credit check, to see if you qualify. We also show you your likely payback period, break-even point, and when you can expect a return on your investment.  Solar systems typically add a minimum of $15,000.00 to the value of your house, which we encourage you to verify with your realtor.

',
                            ],
                            [
                                'title' => 'What Can Expect from Solar Panel Installation in Manteca CA?',
                                'content' => 'Ask yourself this, has my household income tripled over the last 18 years? What about your utility rates? We cannot speak to your income, but we do know that since 2001 PG&E has increased their rates significantly. In 2001, there were two rate tiers with the most expensive one being the summer time rate of 13.3 cents per kWh. As of 2018, however, the top tier is 40.3 cents per kWh for the same E1 rate. In contrast, solar rates have dropped significantly since 2004.

The initial price tag for a Manteca solar energy system may seem high, but ultimately you save money every month by going solar, and you lock in your energy costs because there are no more energy cost hikes.

',
                            ],
                            [
                                'title' => 'Brown Out Solutions with Solar Power Panels',
                                'content' => 'Most people living in California are familiar with brown outs and the discomfort they cause.  Going solar solves that situation. You can eliminate brown outs by installing solar panels in the most energy-efficient location, right where it is consumed, on the roof of your home.

Energy plants are typically miles away from where the energy is consumed, and a plant is a single point of overload and failure. Going solar helps stabilize energy grids by boosting grid voltage while providing your home with secure energy production that is not easily interrupted.

',
                            ],
                            [
                                'title' => 'Ideal Sites for Solar Roof Panels',
                                'content' => 'Here are a few specifics about what a great home for solar looks like.

Roof type: Asphalt shingles – tile and rubber membrane do not cost extra, but shake, slate or 100-year-old clay tile may make solar panel installation a bit more expensive.
Roof age: 5 to 10 years old is ideal. Once the solar panel installers have placed the solar tiles on top of the roof, they will last a long, long time. Therefore, a solar system installation is often combined with a new roof. We work with a number of roofers, which makes going solar and getting a new roof very easy.
Roof orientation: Due south is great, as is a western orientation, but anywhere between east-southeast and west is satisfactory. We are even seeing panels placed north on a roof. While you may face a slight loss in energy compared to other directions, it’s still better than renting from the utility. We can provide detailed analysis for every roof location.
Roof shade: You are looking for none at all, or very little. Shade kills the output of solar panels if they are traditionally wired, as shade on even a small portion of one panel can reduce output of a whole string of panels. We use micro inverters or optimizers on all our systems to overcome shade challenges. SolarEdge, one of our main product suppliers, is 99% CEC (California Energy Commission) rated efficient. This greatly helps any shading your roof may have. Winter and morning shade is not really as large as a concern as summer shade. Get a detailed analysis of your home solar today.
Manteca, California residents and business owners usually have homes and businesses that are perfectly suited to going solar.
',
                            ],
                            [
                                'title' => 'How to Install a Solar Energy System',
                                'content' => 'At Synergy Power, we are one of the solar energy companies that cares about their customers like they are family. We take care of everything from site assessment, to system size and price to engineering a system that will meet your needs, to permits for construction to applying for any incentives directly available from your utility company.

We will also help you understand how to set up billing arrangements with your utility company and to determine whether you need to sign up for special rates, or a time-of-use-plan specifically designed to record energy consumed and energy exported. At Synergy Power, we walk you through the process of going green every step of the way. If you own a business, not to worry, we also install and maintain solar panels for businesses as well.

Fortunately, California has streamlined the interconnection processes required to get your home solar system assessed and connected quickly, once we have installed the solar panel or roof tile system, and it is ready to turn on. Before this happens, an assessment specialist from your utility company looks at the system to verify the presence of necessary hardware, and the correct installation of all wiring. Furthermore, once they have been installed, any solar panel repairs that you may need in the future can also be taken care of by Synergy Power

',
                            ],
                            [
                                'title' => 'Manteca, California',
                                'content' => 'Home to NBA coach Scott Brooks, and Rick and Mortyco-creator Justin Roiland, Manteca is a quaint community in San Joaquin County. Originally, the name of the city was spelled Monteca, but thanks to a typo made by the railway company, Manteca was eventually accepted by its residents. One of the events that the locals most look forward to every year is the “Not Forgotten Memorial Day Event”, in which veterans are celebrated in the largest commemoration on the west coast. Synergy Power supports the city of Manteca’s celebration of the men and women who served in our military and is grateful to provide energy conservation services to its many residents.

As one of the leading solar panel companies, we are available to answer your questions before, during, and after your system is installed, and we are here to provide any necessary solar panel maintenance required over time. Contact us today to begin the journey towards solar power energy panels and lower utility bills.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 22, 
                        'title' => 'Oakdale',
                        'url' => 'oakdale-ca-solar-energy-systems',
                        'content' => [
                            [
                                'title' => 'Oakdale, California Solar Panels for Homes and Businesses',
                                'content' => 'Oakdale, California is a great place to live for many reasons including the fact that it has consistent and strong sunlight totals, making it a great place to live if you want to Go Solar!

Over much of the last decade, California has led the way in the remarkable growth of the US solar market with PV 16,200 megawatts of installed solar power as of October 31, 2017.

As of mid-2017, the average price for solar panels for companies and homes in Oakdale was $3.85 per watt, compared to $9.00 in 2004. The typical residential system size in the United States is 5 kilowatts (5,000 watts), making the average cost of a solar energy system in Oakdale around $17,300 before any rebates or incentives, which impact the Return on Investment (ROI) over the life of your system.
In fact, the average solar panel system in Oakdale cost around $12,000 in 2017, after rebates and before factoring in ROI incentives. This is, in part, due to the 30% rebate offered to both residential and commercial installations. These costs can seem scary when you don’t compare them to what the utility company is charging. Many homeowners are lulled into paying a monthly bill and not realize they have nothing to show for it. Going solar replaces the utility bill and puts money into your home.


',
                            ],
                            [
                                'title' => 'Going Solar is Simple and Effective',
                                'content' => 'At Synergy Power, we offer you a turn-key solution to solar energy power. What does this mean? It means that we do it all in-house so that we can guarantee our customers’ satisfaction. We know that you have questions and we are here to answer them. Our well-trained solar panel installers are always glad to discuss the best solution for your particular home or business.

',
                            ],
                            [
                                'title' => 'Solar Photovoltaic Systems in Oakdale',
                                'content' => 'Photovoltaic (PV) devices convert sunlight into electrical energy. A single PV device is known as a cell. It is small, and generally produces about 1 to 2 watts of power.  These cells are connected to form larger units that are then connected to an electrical grid to form complete photovoltaic systems. Because solar energy systems are modular, they can be built to meet both large and small electric power needs. Made of different semiconductor materials, PV cells come in many sizes and shapes ranging from smaller than a postage stamp, to several inches in width. To withstand outdoor elements for many years, these cells are sandwiched between protective materials. PV modules and arrays are part of a larger system that includes mounting structures and components that convert direct current (DC) electricity to alternating current (AC) current, powering the electrical needs of your home or business. As a turnkey designer and installer of PV solar panels, Synergy Power ensures that all your solar energy system needs are taken care of for your solar panel roof installation, solar panel maintenance, and solar panel repair.

',
                            ],
                            [
                                'title' => 'What are the Benefits of Solar Panel Systems?',
                                'content' => 'There are numerous benefits to hiring solar energy companies to power your home. These benefits include:

Financial Savings: Regardless of changing political stances, the fact is that growing global demand for solar power panels has spurred manufacturing and supply chain updates that have seen the cost of solar power drop significantly in many parts of the United States. Another incentive is that solar systems add as much as 20% in value to your home. This will increase as conventional electrical rates continue to escalate because solar systems stabilize your utility costs.
Sustainability: Solar energy is generated from the sun and is renewable. In addition, solar energy does not require water to operate, which means it does not have a significant impact on water systems the way that fossil fuels do.
Security: Solar-powered systems are less prone to large-scale failure or blackouts since a disruption of a system in one place does not cut off power to an entire region. In fact, a solar energy system is inherently secure when combined with micro-grids.
Job Creation: According to the Union of Concerned Scientists, “in 2011 the US solar industry employed approximately 100,000 people either full or part time.” This number topped over 300,000 in 2017 with close to 78% of jobs associated with solar energy systems being in installation, sales, and project development, while 15% are in manufacturing. This upward trend has been interrupted in 2018 by the imposition of tariffs on solar-related items coming into the United States but that is seen as only temporary.
Peak Power: Usage has been causing brownouts and blackouts in certain parts of the country when power cycles fluctuate, and demand and supply do not match. Traditional solar panels do not have batteries, so any power generated that isn’t used at the home or business is sold back to the utility for purchase later.
At Synergy Power, we offer our customers a turnkey solution that addresses every aspect of going solar. We cover everything including finding the best solar energy system solution for your home or business, solar panel installation or solar roof tile installation, and the installation and maintenance of your system. We know that solar panel systems are an upgrade to your home. According to one study by Lawrence Berkley National Labs, solar panel installation will increase the value of your home by at least $15,000. Also, each kilowatt hour (kWh) of solar that your home or business generates substantially reduces greenhouse gas emissions like CO2, sulfur oxides, nitrogen oxides, particular matter and other dangerous pollutants while reducing water consumption and costly extraction methods necessitated by oil, gas and fracking solutions. Just one hour of noon-time summer sun equals the annual United States’ electricity demand.

',
                            ],
                            [
                                'title' => 'Oakdale, California',
                                'content' => 'Known as the Cowboy Capital of the World, the city of Oakdale houses the Oakdale Cowboy Museum. It is a treasure-trove of history, containing artifacts, photographs, and authentic cowboy gear, such as saddles and holsters. Residents can also enjoy the Stanislaus River, where swimming, camping, kayaking, and fishing is prevalent. However, one of the true unique amenities that Oakdale has to offer is the Sierra Dinner Train, which offers family fun and dining while providing some of the most breathtaking scenery imaginable, all on the 3rd oldest rail line in North America. Oakdale is a lovely community that is committed to moving toward sustainability, and Synergy Power is committed to providing that for them. California has great solar possibilities available directly from the sun. Synergy Power is one of the solar panel companies that is here to help you harness that resource with solar PV. Contact us today!  We will answer your questions and help you increase the value of your home while lowering your annual electricity bill and energy consumption. Solar energy systems are the future. We will offer you a low-risk, long-term investment in your home, your business, and the planet.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 23, 
                        'title' => 'San Jose',
                        'url' => 'san-jose-ca-solar-energy-systems',
                        'content' => [
                            [
                                'title' => 'Power Your San Jose Home with Solar Panels',
                                'content' => 'Solar panels heat and power your home, saving you money on your energy bills. They can also power your air conditioning, heat your swimming pool, and provide power to run your entire home. Installed correctly, solar panels are a win-win for you and your home. Not only are they kind to the planet by reducing CO2 emissions, but they also help trees remove carbon dioxide from the air by providing clean power.

If you are thinking of having solar roof tiles installed, now is the time to speak to the experts. If you are in the San Jose area, Synergy Power is the right team for you. We have been providing solar panel systems to the Bay Area for over 14 years.

',
                            ],
                            [
                                'title' => 'How Solar Panel Installation Can Benefit You',
                                'content' => 'Making the decision to switch your San Jose home over to solar panels might seem like a difficult choice at first. After all, it is a major project, you are going away from what you and your family have used your entire life, and you probably are not sure exactly what solar panel companies are trying to sell you. However, there are major benefits in making the switch.

The first of which is the financial savings you are likely to receive. Solar panel sales reached 17-billion-dollars in 2017. More and more people are starting to see that it doesn’t matter what the political climate might be, the cost of solar power is dropping in many areas of the United States, particularly in California. Couple this with the fact that adding solar panels can increase your home’s value by 20%, and you are seeing a gigantic financial return on your investment.

Solar panels are a much more efficient way to power your home. One of our most common models is the LG365. This is a highly efficient module, at 21% panel efficiency, are able to eliminate that bill on small roofs with very little space. This leads to less power you need to buy from the utility, and more money in your pocket.

Another benefit to keep in mind is the sustainability aspect of solar roof tiles for your San Jose home. The more that we continue to rely upon fossil fuels, the more we are depleting the world of its natural resources. The sun is completely renewable energy. And living in an area like San Jose, there are plenty of sunny days throughout the year. Furthermore, while fossil fuels require water to operate, solar energy does not. This means that you will not significantly impact your local water system the way you would without solar panels.

Lastly, making the choice to go with solar panels with storage can greatly increase security in your home. When a blackout occurs, there is usually a disruption to one part of the entire system. However, this disruption will shut down the entire grid, causing everyone connected to the grid to lose power. This is not the case when there are solar panels and storage installed in your home, especially when they are combined with micro-grids.

',
                            ],
                            [
                                'title' => 'Are you Looking for Solar Panel Installers in San Jose?',
                                'content' => 'Solar panels are best installed on rooftops. Rooftops not only present an unimpeded surface to the sun, which in San Jose is plentiful but also help angle the panels for peak performance. The simpler and less cluttered the roof the better. The presence of dormers and skylights can restrict your options. These solar roof panels are mounted on aluminum racks facing in a south or south-westerly direction.

The cost of solar panel installation includes not only the equipment and labor, but also other factors. You pay a fee to connect your system to the power grid, and there may be other permits to file. The design of the system will depend on the architecture of your house and the size of your grounds. Size and number of rooms will also influence the power output needed.

The good news is that solar panels are designed to last between 25 and 30 years. Even after that period, they will not stop generating electricity altogether, but it will decline gradually. It is not unusual for solar panels to still be generating up to 80% of their power output after 30 years. However, if you find yourself in need of solar panel repair, our team can help with that as well.

',
                            ],
                            [
                                'title' => 'San Jose Solar Panel Maintenance',
                                'content' => 'Solar panels contain no moving parts and are easy to maintain. We recommend cleaning of the solar panels once or twice a year. Trees around your property can prove to be a problem, shedding leaves and creating shade at various times of the day. This can lower the panels’ power output.

To clean your panels, use a soft soap and squeegee; never use an abrasive detergent. It is a good idea to install a monitoring system to track power output and performance. This way you know when it is time to clean off the layer of pollen and grime which accumulates. Synergy Power performs solar panel maintenance throughout the San Jose area. All of our systems come standard with a solar power monitor.

',
                            ],
                            [
                                'title' => 'San Jose and the Bay Area',
                                'content' => 'San Jose is the 3rdlargest city in California and is known around the world for its innovation and progressive thinking. Known as “The Capital of Silicon Valley,” San Jose is the center of technology in the world, with several major tech companies calling it their home. Also, San Jose is one of the best cities in the world to raise a family. Between all of the local parks, such as Alum State Park, to the Children’s Discovery Museum, to Raging Waters, to catching a Sharks game, there is much to see and do in this corner of the Bay Area. If you feel like taking a journey into the unknown, check out the Winchester Mystery House. It is like nothing you have ever seen before.

With all of this technology and progressive thinking, it is easy to see why Synergy Power is proud to provide solar panel service to the residents of San Jose, and the surrounding Bay Area. If you are looking to upgrade your home to a safe, clean, and renewable energy source, contact us today. We can make sure your home gets the power you need and do your part to save the planet as well.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 24, 
                        'title' => 'Stockton',
                        'url' => 'stockton-ca-solar-energy-systems',
                        'content' => [
                            [
                                'title' => 'Going Solar in Stockton, California',
                                'content' => 'Stockton, California is a great place to go green, with a solar panel roof for a number of reasons, not the least of which is the great exposure to the sun.  Couple that with the cost of converting to a solar system dropping across the entire state, and you have the perfect time for putting those solar panels on your roof.

',
                            ],
                            [
                                'title' => 'Savings on Solar Panels in 2018',
                                'content' => 'Low prices are always an incentive, but when considering switching your home or business to solar power, the long-term return on your investment (ROI) should also be a big consideration. Now is a great time for Stockton homeowners and businesses to check with solar energy companies and look into the average savings of converting from a conventional system to a solar energy system.

',
                            ],
                            [
                                'title' => 'Why Convert to Solar Power Energy Now?',
                                'content' => 'Solar energy has been, and continues to be, a political football that gets tossed around according to various state and federal political agendas. Right now, both state and federal incentives are in place to reduce the cost of a solar photovoltaic system to the most affordable levels ever. At Synergy Power, we are committed to not only designing and delivering the best possible solar panels for homes, but also for your specific needs and situation. We also want to help you take advantage of all incentives available to you. Based on a twenty-year average, the typical Stockton, California homeowner with a 5kW solar energy system can expect to increase the resale value of their home by a minimum of $15,000.00, using the value of homes sold in Stockton in 2017 that had solar systems.

',
                            ],
                            [
                                'title' => 'Why Use Synergy Power for Your Solar System?',
                                'content' => 'At Synergy Power, we are committed to you being completely happy with your solar energy system. We know that there are a lot of solar panel companies out there, and that your satisfaction is the key to our continued success. That’s why we do the entire job ourselves. We can guarantee the results. We begin our relationship with you by giving you a quote that includes:

A roof assessment that tells us how much roof area is available for PV solar roof panels and how much sun they will get on an average basis.
A production estimate that estimates how much power the solar roof tiles should produce in kilowatt hours (kWh) per year.
The make and model of equipment being proposed. A solar installation consists of solar panels, racks to attach the panels to your roof, and an inverter to change DC (direct current) power from the panels to AC (alternating current) that runs household appliances. The quote includes the make, model, and number of each component being proposed.
Solar installation costs are quoted in dollars-per-watt with average costs ranging between $2.50 and $4.50 per watt. System costs depend on several factors, including the size of the solar panel installation, and the condition of your roof. Note that the installation size is measured in kilowatts (kW), which means, for example, that a 5-kW system at $3.00 / watt would have a total cost of $15,000.00
Available incentives from both the state of California and the federal government, as well as your utility company incentives.
A payback estimate that uses the production estimate, incentives, and estimated electricity savings to give you a break-even point along with how much you will save over the life of the panels.
',
                            ],
                            [
                                'title' => 'Other Considerations When Going Green in Stockton California',
                                'content' => 'Synergy power is a licensed California contractor dedicated to delivering turnkey solar energy systems. We use our own solar panel installers that adhere to the best possible installation procedures. Our solar panels and inverters are high quality with great warranty coverage. We guarantee our work because we want you to be happy with your system. To that end, we are happy to provide you with customer referrals of other solar installations. We work out an installation schedule that works for you and us, so we both know what to expect. Our installation track record ensures that we will be around to honor any warranties, something that it important to Stockton homeowners. We also offer solar panels for companies, if you are looking to make your business greener. Another important consideration for homeowners in the state of California considering solar panel installation is that the State exempts solar installations for property tax. This is good news as the value of your home can increase thousands of dollars by adding a solar energy system. In fact, if you decrease your electricity bill by somewhere around $1,000 per year real-estate agents estimate that you’ve increased the value of your home by between $15,000 and $20,000, which will not be added to your taxable property value base. Additionally, a study conducted by researchers from the U.S. Department of Energy’s Lawrence Berkeley National Laboratory, shows that homes with solar systems actually sell faster than homes without a solar photovoltaic system.

',
                            ],
                            [
                                'title' => 'How Do I Keep My Solar Panels Clean?',
                                'content' => 'At Synergy Power, we recommend that you have maintenance performed on your solar panel roof tiles once or twice a year. Much like servicing a furnace or cleaning a fire place, maintaining clean solar panels means maintaining good production from them and your overall system. Many panels are easy to reach and are as easy to wash as your dishes. A little soap and water on a sponge and you’ll keep the system running effectively. Another great solution is a vinegar and water solution. Be sure not to use soap that leaves a solar panel too shiny as that will reflect rather than absorb sunlight. You can also simply call us, and we will be happy to clean the solar panels for you.  It is up to you, but as any good auto mechanic will attest, a clean, well-maintained system works well and lasts longer. However, if time gets away from you, or some unforeseen circumstance happens, Synergy Power can perform solar panel repairs for you as well.

',
                            ],
                            [
                                'title' => 'The City of Stockton',
                                'content' => 'Like many towns throughout the state, Stockton was founded as a result of the California Gold Rush in 1849. Its location provided an easy place for trade and transportation to other mines in the area, at the time. Since that time, Stockton has grown exponentially. It is home to the University of the Pacific, the oldest university in California. Furthermore, it is home to the Stockton Symphony, Stockton Arena, and The Bob Hope Theater, making Stockton a hub for the performing arts. Stockton is known as a progressive, forward-thinking community, so it is easy to see why solar power energy is becoming so popular in the area.

',
                            ],
                            [
                                'title' => 'Committed to our Customers',
                                'content' => 'At Synergy Power, we know that the decision to go with solar power panels can be daunting, which is why we are committed to helping you not only understand your options, but also to pick the best one for you. Our solar power energy experts are with you every step of the way from site assessment to turning on your system. Why are we so committed? We believe in solar energy, and satisfied customers, and that the best way forward is with the natural, clean energy provided by the sun. Get started today! Call us with your questions and concerns and let us help you go solar.

',
                            ],

                        ],
                    ],
                ],
            ],
            [
                'id' => 25,
                'title' => 'Learn More',
                'url' => '',
                'children' => [
                    [
                        'id' => 26, 
                        'title' => 'Contact Us',
                        'url' => 'contact-us',
                        'content' => [
                            [
                                'title' => 'Get In Touch With Us!',
                                'content' => 'At Synergy Power, we work hard to help our customers from The Bay to the Mother Lode save money on energy costs and support the environment by switching to solar! But we know that going solar can be a big decision with a lot of unknowns. If you have questions or concerns, a member of our team is ready to talk – without cost or obligation to you. Whether you’re ready to get started, or you just want some answers, just fill out the contact form below, and we’ll get back to you as soon as possible.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 27, 
                        'title' => 'About Us',
                        'url' => 'about-our-solar-panel-company',
                        'content' => [
                            [
                                'title' => 'Our Story',
                                'content' => ' Established in 2005.

Jason became a licensed general contractor in 2005 (CSLB #859392). A few years later, Eric joined what then became a family partnership, altering the license (#CSLB 909061). The license number was adapted again according to state requirements when our S Corp was formed in 2017. This adjustment to our legal structure has broadened our ability to serve more clients.   

Since establishing the small business partnership in 2005, as general contractors we’ve done everything from build a school auditorium to commercial remodels, eventually focusing on both residential and commercial solar. The formation of the new corporate structure in 2017 gives us a new name and solid footing in the market. Until then, much of our work was done for other sales companies and contractors. Launching Synergy Power now allows us to cater directly to the end user.

',
                            ],
                            [
                                'title' => 'Our Experience',
                                'content' => 'Fielding a team that includes two NABCEP certified electricians, our elite installers average nearly a decade of experience per person, among the best trained professionals in the industry. We don’t guess, we know. Our quotes are researched and reliable, ensuring your system performs according to precise, informed estimates. Whether it’s rooftop, canopy, or ground mount installation, our work on homes and/or businesses exceeds all requirements and many expectations.

Serving the solar industry for over 14 years, Synergy Power truly values focused, applied energy- from the sun and our team. We all want better energy. Whether it’s conserving by turning off the lights, or expending it by giving a team member the spotlight, we believe energy should be spent where it does the most good. 

',
                            ],
                            [
                                'title' => 'A Green Leader',
                                'content' => 'Solar is here to stay and we want to share this awesome technology with the world! Not only does solar power save you money, it saves the environment from nasty fossil fuels. Go green today!

',
                            ],
                            [
                                'title' => 'Forward Thinking',
                                'content' => 'With 2,662 solar panels installed and more than $7,269,600 saved for our customers, you can trust our results and our highly trained, NABCEP.org certified installers.

',
                            ],
                            [
                                'title' => 'Problem Solvers',
                                'content' => 'Yes, we can help with that. As experts in solar systems, we can handle any project or problem, from a few panels to hundreds. We’ve got you (and the roof) covered!

',
                            ],
                            [
                                'title' => 'Customer Support',
                                'content' => 'We serve our clients every step of the process, including system design, engineering, permitting, installation, explanation, and off-site monitoring once your system is up and running.

',
                            ],
                        ],
                    ],
                    [
                        'id' => 28, 
                        'title' => 'Reviews',
                        'url' => 'reviews',
                    ],
                    [
                        'id' => 29, 
                        'title' => 'FAQ',
                        'url' => 'faq',
                    ],
                    [
                        'id' => 30, 
                        'title' => 'Blog',
                        'url' => 'blog',
                    ],
                ],
            ],
        ];

        $this->saveTree($menus, null);
    }

    public function saveTree($menus, $parent)
    {
        foreach($menus as $menu)
        {
            $node = Menu::updateOrCreate(
                ['id' => $menu['id']],
                [
                    'title' => $menu['title'],
                    'url' => $menu['url'],
                    'activated' => 1,
                ]
            );

            $content = '';
            if(isset($menu['content'])){
                
                foreach($menu['content'] as $menu_content)
                {
                    $content =  $content .
                        '<br><h2>' .
                        $menu_content['title'] .
                        '</h2>' .
                        '<p>' .
                        $menu_content['content'] .
                        '</p>';
                }
            }

            Page::updateOrCreate(
                ['url' => $menu['url']],
                [
                    'title' => $menu['title'],
                    'content' => $content,
                    'activated' => 1,
                ]
            );

            if(isset($parent)){
                $parent->appendNode($node);
            }
            if(isset($menu['children'])){
                $this->saveTree($menu['children'], $node);
            }
        }
    }
}
