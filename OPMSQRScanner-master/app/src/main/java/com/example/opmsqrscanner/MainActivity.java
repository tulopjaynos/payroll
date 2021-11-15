package com.example.opmsqrscanner;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.activity.result.ActivityResultLauncher;
import androidx.appcompat.app.AppCompatActivity;

import com.journeyapps.barcodescanner.ScanContract;
import com.journeyapps.barcodescanner.ScanOptions;

import java.io.IOException;

import es.dmoral.toasty.Toasty;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.internal.EverythingIsNonNull;

public class MainActivity extends AppCompatActivity {
    private OPMSService opmsService;
    private ScanOptions qrOptions;
    private TextView empCodeValue, empNameValue, empTimeInValue, empTimeOutValue;

    private final ActivityResultLauncher<ScanOptions> qrLauncher = registerForActivityResult(
            new ScanContract(),
            result -> {
                if (result.getContents() == null) {
                    Toast.makeText(this,
                            "QR Code Scanner has been cancelled.", Toast.LENGTH_LONG).show();
                    return;
                }

                String studentID = result.getContents();
                Call<Employee> response = opmsService.timeInOut(studentID);

                response.enqueue(new Callback<Employee>() {
                    @Override
                    @EverythingIsNonNull
                    public void onResponse(Call<Employee> call, Response<Employee> response) {
                        Log.d("RESPONSE_BODY", response.toString());
                        if (response.isSuccessful()) {
                            if (response.body() != null) {
                                Toasty.success(MainActivity.this,
                                        response.body().getMessage(), Toasty.LENGTH_SHORT).show();

                                Employee employee = response.body();
                                empCodeValue.setText(employee.getEmpCode());
                                empNameValue.setText(employee.getFullName());
                                empTimeInValue.setText(employee.getEmpTimeIn());
                                empTimeOutValue.setText(employee.getEmpTimeOut());

                                changeVisibilityOfViews(false);
                            }
                        } else {
                            try {
                                Toasty.error(MainActivity.this,
                                        response.errorBody() != null ? response.errorBody().string()
                                                : "", Toasty.LENGTH_SHORT).show();
                            } catch (IOException e) {
                                e.printStackTrace();
                            }
                        }
                    }

                    @Override
                    @EverythingIsNonNull
                    public void onFailure(Call<Employee> call, Throwable throwable) {
                        Log.d("ERROR_BODY", throwable.getMessage());
                        if (throwable.getMessage() != null)
                            Toasty.error(MainActivity.this, throwable.getMessage(),
                                    Toasty.LENGTH_SHORT).show();
                        call.cancel();
                    }
                });
            });

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        opmsService = OPMSService.retrofit.create(OPMSService.class);

        initViews();
        changeVisibilityOfViews(true);
        initQRScanner();
        final Button qrScannerButton = findViewById(R.id.qrScannerButton);
        qrScannerButton.setOnClickListener(v -> launchQrCodeScanner());
    }

    private void initViews() {
        empCodeValue = findViewById(R.id.empCodeValue);
        empNameValue = findViewById(R.id.empNameValue);
        empTimeInValue = findViewById(R.id.empTimeInValue);
        empTimeOutValue = findViewById(R.id.empTimeOutValue);
    }

    private void changeVisibilityOfViews(boolean isGone) {
        int visibility = isGone ? View.GONE : View.VISIBLE;

        empCodeValue.setVisibility(visibility);
        empNameValue.setVisibility(visibility);
        empTimeInValue.setVisibility(visibility);

        findViewById(R.id.empCodeLabel).setVisibility(visibility);
        findViewById(R.id.empNameLabel).setVisibility(visibility);
        findViewById(R.id.empTimeInLabel).setVisibility(visibility);

        // Don't show Time Out if the employee just got Timed In.
        if (empTimeOutValue.getText().toString().isEmpty())
            return;

        empTimeOutValue.setVisibility(visibility);
        findViewById(R.id.empTimeOutLabel).setVisibility(visibility);
    }

    private void initQRScanner() {
        qrOptions = new ScanOptions();
        qrOptions.setDesiredBarcodeFormats(ScanOptions.QR_CODE);
        qrOptions.setPrompt("Scan your employee's QR Code.");
        qrOptions.setCameraId(0);  // Use a specific camera of the device
        qrOptions.setBeepEnabled(false);
        qrOptions.setBarcodeImageEnabled(true);
    }

    private void launchQrCodeScanner() {
        qrLauncher.launch(qrOptions);
    }
}