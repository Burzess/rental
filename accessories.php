<!-- Accessories -->
<div role="tabpanel" class="tab-pane" id="accessories">
    <!--Accessories-->
    <table>
        <thead>
            <tr>
                <th colspan="2">Accessories</th>
            </tr>
        </thead>
        <tbody>
            <p><?php echo $vehicleType; ?></p>
            <?php if ($vehicleType == 'Motor') { ?>
                <tr>
                    <td>Helmet</td>
                    <td><?php echo ($result->Helmet == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Raincoat</td>
                    <td><?php echo ($result->RainCoat == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Security Lock</td>
                    <td><?php echo ($result->SecurityLock == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Extra Storage</td>
                    <td><?php echo ($result->ExtraStorage == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Hand Guard</td>
                    <td><?php echo ($result->HandGuard == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Extra Mirrors</td>
                    <td><?php echo ($result->ExtraMirrors == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Engine Guard</td>
                    <td><?php echo ($result->EngineGuard == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Knee Guards</td>
                    <td><?php echo ($result->KneeGuards == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Elbow Guards</td>
                    <td><?php echo ($result->ElbowGuards == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td>Air Conditioner</td>
                    <td><?php echo ($result->AirConditioner == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>AntiLock Braking System</td>
                    <td><?php echo ($result->AntiLockBrakingSystem == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Power Steering</td>
                    <td><?php echo ($result->PowerSteering == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Power Windows</td>
                    <td><?php echo ($result->PowerWindows == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>CD Player</td>
                    <td><?php echo ($result->CDPlayer == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Leather Seats</td>
                    <td><?php echo ($result->LeatherSeats == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Central Locking</td>
                    <td><?php echo ($result->CentralLocking == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Power Door Locks</td>
                    <td><?php echo ($result->PowerDoorLocks == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Brake Assist</td>
                    <td><?php echo ($result->BrakeAssist == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Driver Airbag</td>
                    <td><?php echo ($result->DriverAirbag == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Passenger Airbag</td>
                    <td><?php echo ($result->PassengerAirbag == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
                <tr>
                    <td>Crash Sensor</td>
                    <td><?php echo ($result->CrashSensor == 1) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-close" aria-hidden="true"></i>'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>