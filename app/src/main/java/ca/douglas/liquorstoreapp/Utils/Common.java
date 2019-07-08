package ca.douglas.liquorstoreapp.Utils;

import ca.douglas.liquorstoreapp.Retrofit.ILiquorStoreAPI;
import ca.douglas.liquorstoreapp.Retrofit.RetrofitClient;

public class Common {
    //In android emulator Localhost = 10.0.2.2
    private static final String BASE_URL = "http://10.0.2.2/liquorstoreWS/";
    //private static final String BASE_URL = "http://localhost/liquorstoreWS/";

    public static ILiquorStoreAPI getAPI()
    {
        return RetrofitClient.getClient(BASE_URL).create(ILiquorStoreAPI.class);
    }
}
