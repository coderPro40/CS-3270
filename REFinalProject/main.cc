#include "utility.h"
#include "muscle.h"
#include "truck.h"
#include "generateData.h"

//helper template to deallocate memory allocated for vectors and deques of client and different types of package objects
template <class T>
void deletePointers(T data){
	for(int i =0; i < data.size(); i++){
		delete data[i];
		data[i] = 0;
	}
}

int main(){
	try{
		//init deques and vectors to store packages and clients
		deque<OvernightPackage*> overnight;
		deque<TwoDayPackage*> twoDay;
		deque<packages*> regular;
		vector<packages*> pkgs;
		vector<packages*> selected;
		vector<packages*> pending;
		vector<Client*> clients;
		vector<Truck*> trucks;
		const string path = "C:\\Users\\ThankGod4Life\\OneDrive\\Documents\\Fall16ClassesCS\\CS 3528 projects\\finalGroupProject\\data\\packages.txt";
		const string clientsFile{ "C:\\Users\\ThankGod4Life\\OneDrive\\Documents\\Fall16ClassesCS\\CS 3528 projects\\finalGroupProject\\data\\clients.test.txt" };

		//init new muscle and utility
		const size_t newClients{ 1000 };
		Utility* util = new Utility();
		GenerateData* genData = new GenerateData();
		Muscle* muscle = new Muscle();
		location* warehouseLocation = util->readWarehouseAddress();

		//read clients and packages
		genData->generateRandClients(util, newClients);					// generate random clients and packages for run
		util->readClients(clients);
		util->createPackages(path, overnight, twoDay, regular, clients);

		//sort packages based on weight and priority
		util->startSort(overnight, twoDay, regular);

		/*muscle->selectPackages(warehouseLocation, overnight, twoDay, regular, selected);*/

		//put all the selected packages from each priority into pkgs for output
		util->mergePackageTypes(pkgs, overnight, twoDay, regular);

		//use pkgs and trucks based on routes to deliver packages
		muscle->deliveryTrucks(warehouseLocation, pkgs, selected, pending, trucks);

		//update each client on the delivery of each package
		util->updateData(selected);

		//output data
		util->overwritePackagesToFile("C:\\Users\\ThankGod4Life\\OneDrive\\Documents\\Fall16ClassesCS\\CS 3528 projects\\finalGroupProject\\data\\packages.pending.txt", pending);
		util->appendPackagesToFile("C:\\Users\\ThankGod4Life\\OneDrive\\Documents\\Fall16ClassesCS\\CS 3528 projects\\finalGroupProject\\data\\packages.delivered.txt", selected);
		util->appendPackagesToFile("C:\\Users\\ThankGod4Life\\OneDrive\\Documents\\Fall16ClassesCS\\CS 3528 projects\\finalGroupProject\\data\\packages.test.txt", pkgs);
		util->writeClients(clients, clientsFile);

		//print order of packge loading into truck and route to deliver each package
		util->loadInTruckAndDeliver(warehouseLocation, trucks);


		//deallocate memory
		delete warehouseLocation;
		delete util;
		delete muscle;
		deletePointers(clients);
		deletePointers(overnight);
		deletePointers(twoDay);
		deletePointers(regular);

	}catch (const char* e){
		// catch block catch exception and output string
		cout << "\ninvalid format occurred \n" << e;
	}

	return 0;
};